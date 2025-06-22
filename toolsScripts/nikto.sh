#!/bin/bash


rm -f Reports/niktoReport.txt
printf "no\n" | timeout "$2" nikto -h "$1" > Reports/niktoReport.txt 2>&1




