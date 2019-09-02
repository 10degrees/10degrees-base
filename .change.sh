#!/bin/bash
echo -n "New text domain: "
read textdomain
echo -n "New theme name: "
read themename
echo -n "\nChanging textdomain & theme name in:\n"
grep -rl "@textdomain" *.css -R
grep -rl "@textdomain" *.js -R
grep -rl "@theme" *.js -R
echo -n "\nChanging textdomain in:\n"
grep -rl "@textdomain" **/*.php -R
#grep -rl "@textdomain" *.css -R | xargs sed -i "" 's/@textdomain/'$textdomain'/'