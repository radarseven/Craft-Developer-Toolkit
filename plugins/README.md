# Craft Plugins as Submodules

The idea here is to make updating plugins with publicly-accessible repos a bit easier.

## How It Works

* Plugin source should be added to the repo as a `git submodule` in the `/plugins/_src/` directory.
* Each plugin submodule will have it's own directory in `/plugins/_src/` and the directory should be the plugin's `handle`. For example, the plugin `SimpleMeta` with a handle of `simplemeta` should be added as a submodule at `/plugins/_src/simplemeta`.
* Symlinks are used to activate plugins. After adding `simplemeta` as a submodule, a symlink should be created in `/plugins` like `ln -s _src/simplemeta/simplemeta simplemeta`. **Note:** Each plugin's file structure in it's repository can be different. The symlink should point to the root of the plugin's file structure.

## Deploying Submodules with Beanstalk

### Deploying the Submodules to the Server

With Beanstalk, `submodules` will only be deployed if a change in the main project repo is updated. If you prefer to auto-deploy the latest version of a submodule, modify `.gitsubmodules` and add `auto-update=yes` to each submodule entry you would like to auto-deploy. Doing this means that the latest commit from the `master` branch will be deployed for each submodule where the `auto-update` flag is set to `yes`.

### Symlinks on the Server

At the time of writing, Beanstalk does not deploy `symlink` files store in the main repository. As a work around, there is a `makeSymlinks.sh` Bash script that will create the necessary `symlinks` on deploy. The following script should be added to the "Post-deployment commands" settings for each server environment in Beanstalk:

	# Make plugin symlinks.
	cd '/path/to/plugins'; bash makeSymlinks.sh

This script will execute the `makeSymlinks.sh` bash script on the server, creating the necessary `symlinks` for plugins specified. **Important:** Anytime a new plugin submodule is added, the `makeSymlinks.sh` script needs to be updated. See the script source to add new plugins to the script.

## Summary - How to Add a Plugin wiht this Workflow

1. Add publicly-accssible repos as a `git submodule` in `/plugins/_src/{handle}`.
2. Update `/plugins/makeSymlnks.sh` script to include the new plugin.
3. Run `bash makeSymlinks.sh` script from the `/plugins` directory to create the `symlinks` locally.
4. Commit, push and the `submodule` will be deployed on the server.
