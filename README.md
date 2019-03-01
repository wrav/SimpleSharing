# Simple Sharing

![Simple Sharing](resources/img/plugin-logo.png)

Simple Sharing is a CraftCMS plugin that generates social media share links within 
the Craft CP page, allowing you to quickly and easily share entries.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

If use are looking for CraftCMS 2.5 support use previous project [version 1.1.5](https://github.com/hut6/SimpleSharing/tree/1.1.5) 
which is the latest release for CraftCMS 2.5.

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
{{ craft.simpleSharing.link(url, 'google') }}
```

## Credits

Original built while at working at [HutSix](https://hutsix.com.au/) I've since been granted permission to continue development here.

## Change Log

Changes can be viewed [here](https://github.com/wrav/simple-sharing/blob/master/CHANGELOG.md)

## Support

Get in touch via email or by [creating a Github issue](/wrav/simple-sharing/issues)

## Show your Support
This is licensed under the MIT license meaning it will always be free. If you like the plugin, please feel free to show your support and buy me a :beers:. 

[![Beerpay](https://beerpay.io/wrav/SimpleSharing/badge.svg)](https://beerpay.io/wrav/SimpleSharing)
