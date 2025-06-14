<?php
namespace Controller;

use PDO;

class MenuController
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    // Danh sách menu
    public function index()
    {
        $stmt = $this->conn->query("SELECT * FROM menus ORDER BY position, sort_order");
        $menus = $stmt->fetchAll();

        echo "<h1>Quản lý Menu</h1>";
        echo "<a href='admin_menu.php?action=create'>+ Thêm Menu</a>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>ID</th><th>Name</th><th>URL</th><th>Position</th><th>Sort Order</th><th>Hành động</th></tr>";
        foreach ($menus as $menu) {
            echo "<tr>
                <td>{$menu['id']}</td>
                <td>{$menu['name']}</td>
                <td>{$menu['url']}</td>
                <td>{$menu['position']}</td>
                <td>{$menu['sort_order']}</td>
                <td>
                    <a href='admin_menu.php?action=edit&id={$menu['id']}'>Sửa</a> |
                    <a href='admin_menu.php?action=delete&id={$menu['id']}'>Xóa</a>
                </td>
            </tr>";
        }
        echo "</table>";
    }

    // Form thêm menu
    public function create()
    {
        echo "<h1>Thêm Menu</h1>";
        echo "<form method='POST' action='admin_menu.php?action=store'>
            Tên: <input type='text' name='name'><br><br>
            URL: <input type='text' name='url'><br><br>
            Vị trí: <input type='text' name='position'><br><br>
            Thứ tự: <input type='number' name='sort_order' value='0'><br><br>
            <button type='submit'>Lưu</button>
        </form>";
    }

    // Lưu menu mới
    public function store()
    {
        $name = $_POST['name'] ?? '';
        $url = $_POST['url'] ?? '';
        $position = $_POST['position'] ?? '';
        $sort_order = $_POST['sort_order'] ?? 0;

        $stmt = $this->conn->prepare("INSERT INTO menus (name, url, position, sort_order) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $url, $position, $sort_order]);

        header('Location: admin_menu.php');
    }

    // Form sửa menu
    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $stmt = $this->conn->prepare("SELECT * FROM menus WHERE id = ?");
        $stmt->execute([$id]);
        $menu = $stmt->fetch();

        if (!$menu) {
            echo "Menu không tồn tại.";
            return;
        }

        echo "<h1>Sửa Menu</h1>";
        echo "<form method='POST' action='admin_menu.php?action=update&id={$menu['id']}'>
            Tên: <input type='text' name='name' value='{$menu['name']}'><br><br>
            URL: <input type='text' name='url' value='{$menu['url']}'><br><br>
            Vị trí: <input type='text' name='position' value='{$menu['position']}'><br><br>
            Thứ tự: <input type='number' name='sort_order' value='{$menu['sort_order']}'><br><br>
            <button type='submit'>Cập nhật</button>
        </form>";
    }

    // Cập nhật menu
    public function update()
    {
        $id = $_GET['id'] ?? 0;
        $name = $_POST['name'] ?? '';
        $url = $_POST['url'] ?? '';
        $position = $_POST['position'] ?? '';
        $sort_order = $_POST['sort_order'] ?? 0;

        $stmt = $this->conn->prepare("UPDATE menus SET name = ?, url = ?, position = ?, sort_order = ? WHERE id = ?");
        $stmt->execute([$name, $url, $position, $sort_order, $id]);

        header('Location: admin_menu.php');
    }

    // Xóa menu
    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $stmt = $this->conn->prepare("DELETE FROM menus WHERE id = ?");
        $stmt->execute([$id]);

        header('Location: admin_menu.php');
    }
}
