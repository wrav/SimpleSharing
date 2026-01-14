# Simple Sharing

![Simple Sharing](resources/img/plugin-logo.png)

Simple Sharing is a CraftCMS plugin that generates social media share links within 
the Craft CP page, allowing you to quickly and easily share entries.

## Requirements

| Version | Craft CMS | PHP |
|---------|-----------|-----|
| ^3.0.0 | ^5.0.0 | ^8.2 |
| ^2.0.0 | ^4.0.0 | ^8.0.2 |
| ^1.0.0 | ^3.0.0 | ^7.2.5 |

If you are looking for CraftCMS 4.x support, use [Version 2.x](https://github.com/wrav/SimpleSharing/tree/v2)

If you are looking for CraftCMS 3.x support, use [Version 1.0.8](https://github.com/wrav/SimpleSharing/tree/1.0.8)

## Installing

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require wrav/simplesharing

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for SimpleSharing.

## Usage

Your able to generate share links on the fly in a template as followed.

```twig
{{ craft.simpleSharing.link(url, 'facebook') }}
{{ craft.simpleSharing.link(url, 'twitter') }}
{{ craft.simpleSharing.link(url, 'linkedin') }}
{{ craft.simpleSharing.link(url, 'mix') }}
{{ craft.simpleSharing.link(url, 'tumblr') }}
{{ craft.simpleSharing.link(url, 'reddit') }}
```

## Testing

The plugin includes a comprehensive test suite using Codeception with unit, integration, and functional tests.

### Running Tests

Tests require Docker with PostgreSQL:

```bash
# Setup test environment
cp tests/.env.example tests/.env

# Start Docker containers
docker compose up -d

# Access app container
docker exec -it app sh

# Run all tests
vendor/bin/codecept run

# Run specific suites
vendor/bin/codecept run unit
vendor/bin/codecept run integration
vendor/bin/codecept run functional

# Run with coverage report
vendor/bin/codecept run --coverage
```

### Test Coverage

- **Unit Tests**: URL generation, input validation, platform support
- **Integration Tests**: Plugin installation, settings rendering, Craft integration
- **Functional Tests**: Template variable availability

## Credits

Original built while at working at [HutSix](https://hutsix.com.au/) I've since been granted permission to continue development here.

## Change Log

Changes can be viewed [here](https://github.com/wrav/SimpleSharing/blob/master/CHANGELOG.md)

## Become a Contributor

Open-source projects like this one are looking for your help. Feel free to submit a PR or tackle an issue.

## Support

Get in touch via email or by [creating a Github issue](/wrav/SimpleSharing/issues)
