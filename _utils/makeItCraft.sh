#!/bin/bash
function coloredEcho(){
    local exp=$1;
    local color=$2;
    if ! [[ $color =~ '^[0-9]$' ]] ; then
       case $(echo $color | tr '[:upper:]' '[:lower:]') in
        black) color=0 ;;
        red) color=1 ;;
        green) color=2 ;;
        yellow) color=3 ;;
        blue) color=4 ;;
        magenta) color=5 ;;
        cyan) color=6 ;;
        white|*) color=7 ;; # white or invalid color
       esac
    fi
    tput setaf $color;
    echo $exp;
    tput sgr0;
}

###############################################################################
#  ______   ______   ______   ______  ______  ______   __    __   ______
# /\  ___\ /\  == \ /\  __ \ /\  ___\/\__  _\/\  ___\ /\ "-./  \ /\  ___\
# \ \ \____\ \  __< \ \  __ \\ \  __\\/_/\ \/\ \ \____\ \ \-./\ \\ \___  \
#  \ \_____\\ \_\ \_\\ \_\ \_\\ \_\     \ \_\ \ \_____\\ \_\ \ \_\\/\_____\
#   \/_____/ \/_/ /_/ \/_/\/_/ \/_/      \/_/  \/_____/ \/_/  \/_/ \/_____/
#
# Installer Script v0.2.0
# By Matt Stauffer (mattstauffer.co)
#
###############################################################################

mkdir -p tmp

echo ''
coloredEcho "Do you accept Craft's license? [http://buildwithcraft.com/license]"
read -p "[y/N]" -n 1 -r
if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    exit 1
fi
echo ''

echo ''
coloredEcho 'Downloading and installing the latest version of Craft...' green
echo ''

curl -L http://buildwithcraft.com/latest.zip?accept_license=yes -o tmp/Craft.zip
unzip tmp/Craft.zip
rm -rf tmp

permLevel=774
chmod $permLevel craft/app
chmod $permLevel craft/config
chmod $permLevel craft/storage
echo ''
coloredEcho "  chmod $permLevel craft/app" magenta
coloredEcho "  chmod $permLevel craft/config" magenta
coloredEcho "  chmod $permLevel craft/storage" magenta

mv public/htaccess public/.htaccess
coloredEcho '  mv public/htaccess public/.htaccess' magenta
echo ''
echo '------------------'
echo ''
coloredEcho 'NOTE:' red
coloredEcho 'Setting craft/app, craft/config, and craft/storage permissions to be 774; change to your desired permission set.' red
echo ''
coloredEcho 'See the docs for your options: http://buildwithcraft.com/docs/installing' red

echo ''
coloredEcho 'Next steps:' white
coloredEcho ' - Create a database with charset `utf8` and collation `utf8_unicode_ci`' magenta
coloredEcho ' - Update craft/config/db.php with your database credentials' magenta
coloredEcho ' - Run the installer at your-domain.com/admin' magenta
coloredEcho " - Delete public/web.config if you're on Apache, or delete public/.htaccess if you're on IIS" magenta
coloredEcho '' magenta
coloredEcho 'Happy Crafting!' white
