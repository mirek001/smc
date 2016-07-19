#!/bin/bash
git add .
echo -n "New comment:"
read $comment
git commit -m  "\x022 $comment \x022"
git remote add origin https://github.com/mirek001/smc.git
git push -u origin master
