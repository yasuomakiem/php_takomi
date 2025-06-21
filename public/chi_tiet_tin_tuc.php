<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin.php?action=login');
    exit;
}
$config = require __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();

    // Lấy ID từ URL: ví dụ /dich-vu/1
$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($path, '/'));
$id = isset($parts[1]) ? (int) $parts[1] : 0;

if ($id <= 0) {
    die('Không tìm thấy dịch vụ!');
}

// Lấy thông tin dịch vụ
$sql = "SELECT * FROM news WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    die('Dịch vụ không tồn tại!');
}

// Lấy chi tiết
$sql = "SELECT * FROM new_details WHERE service_id = :service_id";
$stmt = $conn->prepare(query: $sql);
$stmt->execute([':service_id' => $id]);
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2 class="text-center"><?= htmlspecialchars($service['name']) ?></h2>
    <p class="text-center"><?= htmlspecialchars($service['description']) ?></p>

    <?php if (!empty($service['image'])): ?>
        <img class="w-100" src="<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['name']) ?>"
            >
    <?php endif; ?>

    <hr>


    <?php foreach ($details as $detail): ?>
        <?php
        $tag = strtolower(trim($detail['detail_name']));
        $value = htmlspecialchars($detail['detail_value']);

        switch ($tag) {
            case 'p':
            case 'h1':
            case 'h2':
            case 'h3':
            case 'strong':
                echo "<$tag>$value</$tag>";
                break;
            case 'ul':
                // Xử lý: value = "Item 1, Item 2, Item 3"
                $items = array_map('trim', explode(',', $detail['detail_value']));
                echo '<ul>';
                foreach ($items as $item) {
                    echo '<li>' . htmlspecialchars($item) . '</li>';
                }
                echo '</ul>';
                break;
            default:
                // Mặc định: bọc div
                echo "<div>$value</div>";
        }
        ?>
    <?php endforeach; ?>
</div>