#!/bin/bash

  timeout  "$2" /usr/share/zaproxy/zap.sh -cmd -quickurl "$1" > Reports/zapReport.txt
