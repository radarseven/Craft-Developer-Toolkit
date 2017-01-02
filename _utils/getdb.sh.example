#!/usr/bin/env bash

# Import a remote database into a local database
# ----------------------------------------------
#
# Based on http://danherd.net/quick-script-synchronise-from-a-remote-expressionengine-database/
#
# Don’t forget chmod +x to make the script executable.
#
# Change the extension to .command to run the script directly from OS X Finder.
#

# ----------------------------------------------
# LOCAL SETTINGS
# ----------------------------------------------

# Set directory for local database backup
# This must be full path like /Users/boom/Sites/myradsite.com/_sql/_local
LOCALBACKUPDIR="./_sql/local/"

# Set mysqldump client
# If you're not using MAMP and you're on a Unix/Linux system,
# run `which mysqldump` from a terminal prompt
# and set this to whatever that returns.
MYSQLDUMP="/Applications/MAMP/Library/bin/mysqldump"

# Set mysql client
# If you're not using MAMP and you're on a Unix/Linux system,
# run `which mysql` from a terminal prompt
# and set this to whatever that returns.
MYSQL="/Applications/MAMP/Library/bin/mysql"

# Set local database host
LOCALDBHOST="localhost"
# Set local database user
LOCALDBUSER=""
# Set local database password
LOCALDBPASS=""
# Set local database name
LOCALDBNAME=""
# Set local database port
# For Homestead or any other configuration
# using a custom port for MySQL.
LOCALDBPORT="3306"

# ----------------------------------------------
# REMOTE SETTINGS
# ----------------------------------------------

# Set SSH host
SSHHOST="" # Server connection i.e. user@1.1.1.1
# Set remote database host
REMOTEDBHOST=""
# Set remote database user
REMOTEDBUSER=""
# Set remote database password (leave single quotes for special characters)
REMOTEDBPASS="''"
# Set remote database name
REMOTEDBNAME=""




##################################################
# ---------------------------------------------- #
#                 DO NOT EDIT! 
# ---------------------------------------------- #
##################################################


# Let’s go!
# ---------

# Run script in current directory
cd "`dirname "$0"`"

# Backup local database
$MYSQLDUMP \
-P $LOCALDBPORT \
-h $LOCALDBHOST \
-u $LOCALDBUSER \
$LOCALDBNAME \
-p$LOCALDBPASS \
| gzip > $LOCALBACKUPDIR/BACKUP_$(date +%Y-%m-%d_%H-%M-%S)_local_$LOCALDBNAME.sql.gz

# Connect to the remote machine and get a compressed dump of the database
ssh $SSHHOST \
"cd tmp &&
mysqldump \
-h $REMOTEDBHOST \
-u $REMOTEDBUSER \
$REMOTEDBNAME \
-p$REMOTEDBPASS \
| gzip > $REMOTEDBNAME.sql.gz"

# Connect again and copy the compressed dump created above into the local temporary files folder
scp $SSHHOST:~/tmp/$REMOTEDBNAME.sql.gz /tmp/

# Decompress the file
gunzip \
-f /tmp/$REMOTEDBNAME.sql.gz

# Load the decompressed dump into the local database server
$MYSQL \
-P $LOCALDBPORT \
-h $LOCALDBHOST \
-u $LOCALDBUSER \
-P $LOCALDBPORT \
-p$LOCALDBPASS \
-D $LOCALDBNAME \
< /tmp/$REMOTEDBNAME.sql

# Delete the file from the local temporary files folder
rm /tmp/$REMOTEDBNAME.sql

# Connect again and delete the file from the remote temporary files folder
ssh $SSHHOST \
"rm tmp/$REMOTEDBNAME.sql.gz"

# Did it work?
echo "Success!"%
