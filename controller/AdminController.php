<?php
namespace Controller;

use PDO;

class AdminController
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    // Trang login
    public function login()
    {
        echo "<h1>Admin Login</h1>";
        echo "<form method='POST' action='admin.php?action=auth'>
            Email: <input type='email' name='email'><br><br>
            Password: <input type='password' name='password'><br><br>
            <button type='submit'>Đăng nhập</button>
        </form>";
    }

    // Xác thực: Check với bảng users (name='admin')
    public function auth()
    {
        session_start();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Tìm user name = admin + email đúng
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE name = 'admin' AND email = ?");
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin.php');
        } else {
            echo "<p style='color:red'>Sai thông tin đăng nhập!</p>";
            $this->login();
        }
    }

    // Đăng xuất
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: admin.php?action=login');
    }

    // Dashboard admin
    public function index()
    {
        echo "<h1>Admin Dashboard</h1>";
        echo "<p>Xin chào Admin!</p>";
        echo "<a href='admin.php?action=logout'>Đăng xuất</a>";
    }
}