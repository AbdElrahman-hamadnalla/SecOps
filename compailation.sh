#!/bin/bash
compailed="simple_chat_ai/compailedReport.txt"
# Define input and output files
input_nmap="Reports/nmapReport.txt"
output_nmap="Reports/nmapReportModified.txt"

# Extract CVE numbers and save to output file
grep -oP 'CVE-\d{4}-\d{4,}' "$input_nmap" | sort -u > "$output_nmap"
echo "CVE numbers have been extracted to $output_nmap"

grep -v "links visited" Reports/commixReport.txt > Reports/commixReportModified.txt

# Define input and output files
input_zap="Reports/zapReport.txt"
output_zap="Reports/zapReportModified.txt"

# Extract CWE numbers and save to output file
grep -oP '<cweid>\d{1,}' "$input_zap" | sort -u > "$output_zap"
grep -oP  '(?<=<name>).*?(?=</name>)' "$input_zap" >> "$output_zap"
echo "CWE numbers have been extracted to $output_zap"


#$output_fileCVWE = "simple_chat_ai/cvwe_numbers.txt"

output_nuclei="Reports/nucleiReport.txt"
output_nikto="Reports/niktoReport.txt"
output_whatweb="Reports/whatwebReport.txt"
output_sqlmap="Reports/sqlmapReport.txt"
output_XSStrike="Reports/XSStrikeReport.txt"
output_arachni="Reports/arachniReport.txt"

input_commix="Reports/commixReportModified.txt"
output_commix="Reports/commixReportModified2.txt"
tail -n +15  "$input_commix" > "$output_commix"

input_wapiti="Reports/wapitiReport.txt"
output_wapiti="Reports/wapitiReportModified.txt"
tail -n +41  "$input_wapiti" | head -n -10 > "$output_wapiti"

echo "                                                              THE COMPILED REPORT for $1"  > "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the nmap output"  >> "$compailed"
cat  "$output_nmap"  >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the zap output"  >> "$compailed"
cat   "$output_zap"  >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the nuclei output"  >> "$compailed"
cat   "$output_nuclei"  >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the nikto output"  >> "$compailed"
cat   "$output_nikto"  >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the wapiti output"  >> "$compailed"
cat  "$output_wapiti" >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the whatweb output"  >> "$compailed"
cat  "$output_whatweb" >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the commix output"  >> "$compailed"
cat  "$output_commix" >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the sqlmap output"  >> "$compailed"
cat  "$output_sqlmap" >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the XSStrike output"  >> "$compailed"
cat  "$output_XSStrike" >> "$compailed"
echo "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++">> "$compailed"
echo "              the arachni output"  >> "$compailed"
cat  "$output_arachni" >> "$compailed"

