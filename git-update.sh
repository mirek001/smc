#!/bin/bash
git add .
echo -n "New comment:"
read $comment
git commit -m '"$comment"'
git remote add origin https://github.com/mirek001/smc.git
git push -u origin master
