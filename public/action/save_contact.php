<?php
$config = require __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu form
    $name = $_POST['form_fields']['field_f262d60'] ?? '';
    $phone = $_POST['form_fields']['field_b66f8f9'] ?? '';
    $email = $_POST['form_fields']['field_0300828'] ?? '';
    $message = $_POST['form_fields']['field_0c34597'] ?? '';

    // Chuẩn bị câu lệnh INSERT
    $sql = "INSERT INTO contacts (name, phone, email, message) VALUES (:name, :phone, :email, :message)";
    $stmt = $conn->prepare($sql);

    // Bind và thực thi
    $stmt->execute([
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':message' => $message
    ]);

    // Chuyển hướng hoặc thông báo
    echo "Cảm ơn bạn đã đăng ký!";
}
