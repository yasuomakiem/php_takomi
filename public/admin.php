<?php
session_start();

$config = require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../controller/AdminController.php';

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
