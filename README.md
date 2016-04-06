# Craft Developer Toolkit
A starter kit and collection of developer tools for building [Craft CMS](http://buildwithcraft.com) powered websites.

This is opinionated and you may not agree with everything here. This is opinionated and you may not agree with everything here. If you disagree with something post an issue.

## Initial Setup

1. Download the zip file and unpack.
2. Bang open a shell, `cd` into the directory you've unpacked the zip to and run `bash start.sh`. This will do the following: 
    1. Run Matt's `makeItCraft` shell script. This will download Craft, follow the prompts. We also recommend that you use Matt's `DotEnv` setup and this toolkit assumes you will.
    2. Remove some unneeded files from the fresh Craft install.
    3. Move the customized files into their right place.
    4. Set permissions on files and directories.
    5. Remove the setup scripts.

## What's Different From a Stock Craft Install?

### Config

This setup supports a multi-environment config a bit differently than the native Craft config.



## Credits

- [Matt Stauffer](https://github.com/mattstauffer): This setup uses Matt's handy `makeItCraft` shell script for the initial Craft CMS setup.
