#!/bin/bash
/opt/arachni/bin/arachni "$1" --output-only-positives --report-save-path=Reports/arachniReport.afr

/opt/arachni/bin/arachni_reporter Reports/arachniReport.afr --reporter=stdout > Reports/arachniReport.txt