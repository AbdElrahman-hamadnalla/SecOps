#!/bin/bash
timeout "$2" sqlmap -u "$1" --batch --output-dir=./sqlmap_report > Reports/sqlmapReport.txt