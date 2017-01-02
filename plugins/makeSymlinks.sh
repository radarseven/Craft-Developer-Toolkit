#!/usr/bin/env bash

# Declare associative array of plugins.
declare -A plugins

# Key is the plugin handle.
# Value is the path to the plugin submodule.

plugins[simplemeta]=_src/simplemeta/simplemeta
plugins[seomatic]=_src/seomatic
plugins[fieldmanager]=_src/fieldmanager/fieldmanager
plugins[pimpmymatrix]=_src/pimpmymatrix/pimpmymatrix
plugins[typogrify]=_src/typogrify/typogrify
plugins[amnav]=_src/amnav
plugins[relabel]=_src/relabel/relabel
plugins[linkit]=_src/linkit/linkit
plugins[stamp]=_src/stamp
plugins[supertable]=_src/supertable/supertable
plugins[acefreely]=_src/acefreely/acefreely
plugins[supercooltools]=_src/supercooltools/supercooltools
plugins[buttonbox]=_src/buttonbox/buttonbox
plugins[supersort]=_src/supersort/supersort
plugins[lj_cookies]=_src/lj_cookies/lj_cookies

# END plugins array.

# -------------------------- #
# DON'T EDIT BELOW THIS LINE #
# -------------------------- #

for i in "${!plugins[@]}"; do
	if [ ! -L $i ]; then
		ln -s "${plugins[$i]}" "$i"
	fi
done
