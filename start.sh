#!/usr/bin/env bash

# Do some cool setup stuff up 'er when first setting up the project. #

# Run permissions.sh
bash ./permissions.sh

# Remove unnecessary files from fresh Craft install.
rm -f ./public/web.config
rm -f ./public/htaccess

# Move some modified Craft files into their right place.
mv -f ./index.php ./public/index.php
mv -f ./.htaccess ./public.htaccess
mv -f ./robots.txt ./public/robots.txt
mv -f ./robots_dev.txt ./public/robots_dev.txt
mv -f ./humans.txt ./public/humans.txt
