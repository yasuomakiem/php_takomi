<?php

// Load config
$config = require_once __DIR__ . '/config/config.php';

// Load các class cần thiết
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/controller/HomeController.php';

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
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/home.php';

    require_once __DIR__ . '/partials/footer.php>';    

} elseif ($path === '/admin') {
     require_once __DIR__ . '/public/admin.php';

} elseif ($path === '/services') {
    require_once __DIR__ . '/controller/ServiceController.php';
    $controller = new Controller\ServiceController($conn);
    $controller->index();
} elseif ($path === '/tin-tuc-su-kien') {
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/tin_tuc.php';

    require_once __DIR__ . '/partials/footer.php';    
}elseif ($path === '/gioi-thieu') {
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/gioi_thieu.php';

    require_once __DIR__ . '/partials/footer.php';    
}elseif ($path === '/lien-he') {
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/lien_he.php';

    require_once __DIR__ . '/partials/footer.php';    
}elseif ($path === '/san-pham-dich-vu') {
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/dich_vu.php';

    require_once __DIR__ . '/partials/footer.php';    
}elseif (strpos($path, '/dich-vu') === 0) {
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/chi_tiet_dich_vu.php';

    require_once __DIR__ . '/partials/footer.php';
}elseif (strpos($path, '/tin-tuc') === 0) {
    require_once __DIR__ . '/partials/header.php';

    require_once __DIR__ . '/public/chi_tiet_tin_tuc.php';

    require_once __DIR__ . '/partials/footer.php';
}else {
    http_response_code(404);
    echo "404 - Not Found";
}
?>
