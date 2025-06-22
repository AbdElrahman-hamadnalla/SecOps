#!/bin/bash
timeout  "$2" commix -u "$1" --crawl=2 --batch > Reports/commixReport.txt 


