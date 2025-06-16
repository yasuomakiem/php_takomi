<?php

// Load config
$config = require_once __DIR__ . '/../config/config.php';

// Load các class cần thiết
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../controller/HomeController.php';

// Khởi tạo Database với config
$db = new Core\Database($config);
$conn = $db->connect();

$sql = "SELECT * FROM services ORDER BY id DESC LIMIT 8";
$stmt = $conn->query($sql);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($services);
// echo '</pre>';
$request = $_SERVER['REQUEST_URI'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$path = str_replace($script_name, '', $request);
$path = strtok($path, '?'); // Bỏ query string

// ROUTER
if ($path === '/' || $path === '/home') {
    require_once __DIR__ . '/../partials/header.php';

    require_once __DIR__ . '/home.php>';

    require_once __DIR__ . '/../partials/footer.php>';    

} elseif ($path === '/admin') {
    require_once __DIR__ . '/../controller/AdminController.php';
    $controller = new Controller\AdminController($conn);
    $controller->index();

} elseif ($path === '/services') {
    require_once __DIR__ . '/../controller/ServiceController.php';
    $controller = new Controller\ServiceController($conn);
    $controller->index();
} elseif ($path === '/tin-tuc') {
    require_once __DIR__ . '/../partials/header.php';

    require_once __DIR__ . '/tin_tuc.php';

    require_once __DIR__ . '/../partials/footer.php';    
}elseif ($path === '/gioi-thieu') {
    require_once __DIR__ . '/../partials/header.php';

    require_once __DIR__ . '/gioi_thieu.php';

    require_once __DIR__ . '/../partials/footer.php';    
} 
else {
    http_response_code(404);
    echo "404 - Not Found";
}
?>
