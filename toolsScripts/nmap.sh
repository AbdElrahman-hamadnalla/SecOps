#!/bin/bash
remove_https() {
    local url=$1
    echo "${url#https://}"
}

url="$1"
output_url=$(remove_https "$url")
timeout  "$2" nmap -sV --script vulners -oN Reports/nmapReport.txt $output_url 
