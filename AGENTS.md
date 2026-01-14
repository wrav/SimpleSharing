# Repository Guidelines

## Project Structure & Module Organization
- `src/`: Plugin source code (controllers, models, asset bundles, templates, variables).
- `tests/`: Codeception suites (`unit/`, `functional/`) plus support data in `_support/` and `_data/`.
- `resources/`: Plugin resources and metadata assets.
- `vendor/`: Composer-managed dependencies (generated).

## Build, Test, and Development Commands
- `composer install --dev`: Install runtime + dev dependencies for local development.
- `composer require wrav/simplesharing`: Install the plugin into a Craft project.
- `vendor/bin/codecept run`: Run all Codeception tests.
- `vendor/bin/codecept run unit`: Run unit tests only.
- `vendor/bin/codecept run functional`: Run functional tests only.
- `vendor/bin/codecept run --coverage`: Generate a coverage report.

## Coding Style & Naming Conventions
- Language: PHP 8.2; Craft CMS plugin conventions.
- Autoloading: PSR-4 namespace `wrav\simplesharing\` mapped to `src/`.
- File naming: Class files match class names (e.g., `SimpleSharing.php`).
- Indentation: 4 spaces; keep files ASCII unless existing content requires Unicode.

## Testing Guidelines
- Framework: Codeception (with PHPUnit under the hood).
- Suites: `unit` and `functional` are defined by `tests/*.suite.yml`.
- Naming: Place unit tests in `tests/unit` and functional tests in `tests/functional`; match Codeception naming conventions (e.g., `*Test.php`).
- Config: Set Craft test environment in `tests/_craft/config/test.php` before running functional tests.

## Commit & Pull Request Guidelines
- Commits: Use short, imperative, sentence-case summaries (e.g., “Fix coverage summary extraction”); no prefix observed in recent history.
- PRs: Include a clear description, linked issue (if any), and test results. Add screenshots or recordings for Control Panel UI changes.

## Security & Configuration Tips
- Do not commit secrets or `.env` files. Use local environment overrides only.
- Validate changes against Craft’s plugin requirements (`composer.json`) before release.
