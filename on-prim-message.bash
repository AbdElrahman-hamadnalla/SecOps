jq -n --arg msg "$(cat simple_chat_ai/compailedReport.txt)" '{"message": $msg}' \
| curl -X POST https://b0ba-197-53-91-148.ngrok-free.app/api_receive.php \
     -H "Content-Type: application/json" \
     
     -d @-
