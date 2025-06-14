<?php
session_start();

$config = require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../controller/MenuController.php';

// Kết nối
$db = new Core\Database($config);
$conn = $db->connect();

$menu = new Controller\MenuController($conn);

// Check đăng nhập admin
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin.php?action=login');
    exit;
}

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $menu->create();
        break;
    case 'store':
        $menu->store();
        break;
    case 'edit':
        $menu->edit();
        break;
    case 'update':
        $menu->update();
        break;
    case 'delete':
        $menu->delete();
        break;
    default:
        $menu->index();
        break;
}
