#!/usr/bin/env bash

cd craft

mkdir -p storage

find ./app -type d -exec chmod 777 {} +
find ./config -type d -exec chmod 777 {} +
find ./storage -type d -exec chmod 777 {} +

echo "Craft permissions updated!"
