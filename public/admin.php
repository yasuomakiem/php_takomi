<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$config = require __DIR__ . '/../config/config.php';
require_once  __DIR__ . '/../core/Database.php';
require __DIR__ . '/../controller/AdminController.php';

$db = new Core\Database($config);
$conn = $db->connect();

$admin = new Controller\AdminController($conn);

$action = $_GET['action'] ?? 'index';


if (!isset($_SESSION['admin_logged_in']) && !in_array($action, ['login', 'auth'])) {
    header('Location: admin.php?action=login');
    exit;
}

switch ($action) {
    case 'login':
        $admin->login();
        break;
    case 'auth':
        $admin->auth();
        break;
    case 'logout':
        $admin->logout();
        break;
    default:
        $admin->index();
        break;
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Trang Admin</title>
    <!-- CSS dùng chung -->
    <link rel="stylesheet" href="../css/bs-4.css">
    <link rel="stylesheet" href="../css/custom-frontend.min.css">
    <link rel="stylesheet" href="../css/custom-pro-widget-nav-menu.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>
    <body>
        <?php
        if (session_status() === PHP_SESSION_NONE) session_start();

        // Lấy giá trị module từ query string
        $module = isset($_GET['module']) ? $_GET['module'] : '';

        // Xử lý theo module
        if ($module === 'dich-vu') {
           require_once __DIR__ . '/admin_module/dich_vu.php>';
        } elseif ($module === 'nguoi-dung') {
            require_once __DIR__ . '/admin_module/nguoi_dung.php>';
        } elseif ($module === 'tin-tuc') {
            require_once __DIR__ . '/admin_module/tin_tuc.php>';
        }elseif (empty($module)) {
        } else {
            echo "404 - Module không tồn tại.";
        }
        ?>
    </body>
</html>
