<?php
// Kết nối DB
$config = require __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();

// Lấy danh sách dịch vụ
$sql = "
    SELECT s.*, c.name AS category_name
    FROM services s
    JOIN service_categories c ON s.category_id = c.id
";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Lấy tất cả hàng
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="container mt-5">
    <h1 class="mb-4">Danh sách Dịch vụ</h1>

    <a href="add_service.php" class="btn btn-success mb-3">Thêm Dịch vụ</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên dịch vụ</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th> <!-- Đổi từ ID sang tên -->
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="<?= htmlspecialchars($row['image']) ?>" width="100">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($row['category_name']) ?></td>
                        <td>
                            <a href="edit_service.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="delete_service.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xoá?');">Xoá</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Không có dịch vụ nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>