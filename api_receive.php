<?php
// api_receive.php

// إعداد الهيدر للرد كـ JSON
header("Content-Type: application/json");

// قيمة الـ API key المطلوبة

// تحقق من وجود الهيدر: Authorization
$headers = getallheaders();
$provided_key = $headers['Authorization'] ?? '';

// قارن المفتاح
if ($provided_key !== API_KEY) {
    http_response_code(401); // Unauthorized
    echo json_encode([
        "status" => "error",
        "message" => "Unauthorized: Invalid API key"
    ]);
    exit;
}

// قراءة محتوى الطلب كـ JSON
$data = json_decode(file_get_contents("php://input"), true);

// التحقق من وجود الرسالة
if (isset($data['message'])) {
    $msg = $data['message'];

    // كتابة الرسالة في ملف (بدون append)
    file_put_contents("Reports/on-prim-compiled-report.txt", $msg);

    // الرد
    echo json_encode([
        "status" => "success",
        "message" => $msg
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No message received"
    ]);
}
