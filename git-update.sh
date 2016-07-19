#!/bin/bash
echo -n "Wpisz komentarz:"
read $comment
git commit -m "$comment"
git remote add origin https://github.com/mirek001/smc.git
git push -u origin master
