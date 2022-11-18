# Simple Sharing

![Simple Sharing](resources/img/plugin-logo.png)

Simple Sharing is a CraftCMS plugin that generates social media share links within 
the Craft CP page, allowing you to quickly and easily share entries.

## Requirements
Current Version: 2.0.0\
This plugin requires Craft CMS ^4.0.0. 

If you are looking for CraftCMS 3.x support, use current project [Version 1.0.8](https://github.com/wrav/SimpleSharing/tree/1.0.8)

If you are looking for CraftCMS 2.5 support, use previous project [version 1.1.5](https://github.com/hut6/SimpleSharing/tree/1.1.5)

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

## Credits

Original built while at working at [HutSix](https://hutsix.com.au/) I've since been granted permission to continue development here.

## Change Log

Changes can be viewed [here](https://github.com/wrav/SimpleSharing/blob/master/CHANGELOG.md)

## Become a Contributor

Open-source projects like this one are looking for your help. Feel free to submit a PR or tackle an issue.

## Support

Get in touch via email or by [creating a Github issue](/wrav/SimpleSharing/issues)
