#!/bin/bash
git add .
#echo -n "New comment:"
#read $comment
git commit -m  "1.2.312"
git remote add origin https://github.com/mirek001/smc.git
git push -u origin master
