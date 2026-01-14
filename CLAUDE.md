# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Simple Sharing is a Craft CMS 5.x plugin that generates social media share links within the Control Panel, allowing quick sharing of entries to Facebook, Twitter, LinkedIn, Mix, Tumblr, and Reddit.

## Commands

```bash
# Install dependencies
composer install --dev

# Build Codeception (regenerate actor classes)
vendor/bin/codecept build

# Check PHP syntax
find src tests -name "*.php" -exec php -l {} \;
```

### Running Tests (requires Docker)

Tests require a PostgreSQL database. Use Docker Compose:

```bash
# Setup test environment
cp tests/.env.example tests/.env

# Start Docker containers
docker compose up -d

# Access app container and run tests
docker exec -it app sh
vendor/bin/codecept run              # All tests
vendor/bin/codecept run unit         # Unit tests only
vendor/bin/codecept run integration  # Integration tests only
vendor/bin/codecept run --coverage   # With coverage
```

## Architecture

**Plugin Structure** (`src/`):
- `SimpleSharing.php` - Main plugin class, registers Twig variable and injects CP JavaScript
- `variables/SimpleSharingVariable.php` - Twig variable providing `craft.simpleSharing.link(url, service)`
- `models/Settings.php` - Plugin settings (allowedSections, allowedPlatforms)
- `controllers/DefaultController.php` - Controller for CP actions (`actionUrl`)
- `assetbundles/simplesharing/` - JavaScript for CP sidebar functionality
- `templates/settings.twig` - Settings page template

**Key Integration Points**:
- Registers `simpleSharing` variable on `CraftVariable::EVENT_INIT`
- Injects JavaScript on `View::EVENT_END_PAGE` for CP requests
- Extends `craft\base\Plugin` with settings model

**Testing** (`tests/`):
- Uses Codeception with `unit`, `integration`, and `functional` suites
- Unit tests: Core functionality without Craft bootstrap
- Integration tests: Full Craft CMS integration with plugin installed
- Test config in `codeception.yml` with `\craft\test\Craft` module
- Database setup: `dbSetup: { clean: true, setupCraft: true }`

## Supported Platforms

facebook, twitter, linkedin, mix, tumblr, reddit
