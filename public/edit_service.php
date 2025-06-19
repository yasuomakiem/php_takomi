<?php
// Kết nối DB
$config = require __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();

// Lấy ID dịch vụ từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy thông tin dịch vụ hiện tại
$sql = "SELECT * FROM services WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    die('Dịch vụ không tồn tại!');
}

// Lấy danh sách danh mục
$sql = "SELECT * FROM service_categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh sách chi tiết dịch vụ
$sql = "SELECT * FROM service_details WHERE service_id = :service_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':service_id' => $id]);
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nếu form cập nhật dịch vụ được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['action'])) {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $category_id = (int)($_POST['category_id'] ?? 0);

    // Giữ ảnh cũ mặc định
    $image = $service['image'];

    // Nếu có file upload mới
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $tmpName = $_FILES['image']['tmp_name'];
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $targetPath)) {
            $image = '/uploads/' . $fileName;
        }
    }

    // Cập nhật DB
    $sql = "UPDATE services SET name = :name, image = :image, description = :description, category_id = :category_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':image' => $image,
        ':description' => $description,
        ':category_id' => $category_id,
        ':id' => $id
    ]);

    // Chuyển về trang danh sách dịch vụ
    header('Location: ../admin.php?module=dich-vu');
    exit;
}

// Thêm chi tiết mới
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_detail') {
    $detail_name = $_POST['detail_name'] ?? '';
    $detail_value = $_POST['detail_value'] ?? '';

    $sql = "INSERT INTO service_details (service_id, detail_name, detail_value, created_at, updated_at)
            VALUES (:service_id, :detail_name, :detail_value, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':service_id' => $id,
        ':detail_name' => $detail_name,
        ':detail_value' => $detail_value
    ]);

    // Quay lại trang hiện tại
    header("Location: edit_service.php?id=$id");
    exit;
}

// Xóa chi tiết
if (isset($_GET['delete_detail'])) {
    $detail_id = (int)$_GET['delete_detail'];
    $sql = "DELETE FROM service_details WHERE id = :id AND service_id = :service_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $detail_id, ':service_id' => $id]);

    // Quay lại trang hiện tại
    header("Location: edit_service.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Dịch vụ</title>
    <link rel="stylesheet" href="../css/bs-4.css">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Sửa Dịch vụ</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên Dịch vụ</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($service['name']) ?>" required>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <input type="text" name="description" class="form-control" value="<?= htmlspecialchars($service['description']) ?>" required>
        </div>

        <div class="form-group">
            <label>Hình ảnh (Tải file mới nếu muốn thay đổi)</label>
            <input type="file" name="image" class="form-control">

            <?php if (!empty($service['image'])): ?>
                <p class="mt-2">Ảnh hiện tại:</p>
                <img src="../<?= htmlspecialchars($service['image']) ?>" alt="Hình hiện tại" class="image-thumbnail" style="max-width: 200px;">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $service['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="../admin.php?module=dich-vu" class="btn btn-secondary">Quay lại</a>
    </form>

    <h2 class="mt-5">Chi tiết Dịch vụ</h2>

    <!-- Form thêm chi tiết mới -->
    <form method="POST" class="mb-4">
        <input type="hidden" name="action" value="add_detail">
        <div class="form-row">
            <div class="col">
                <input type="text" name="detail_name" class="form-control" placeholder="Tên thẻ (p, h1...)" required>
            </div>
            <div class="col">
                <input type="text" name="detail_value" class="form-control" placeholder="Nội dung" required>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">Thêm Chi tiết</button>
            </div>
        </div>
    </form>

    <!-- Danh sách chi tiết -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Thẻ</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr>
                    <td><?= $detail['id'] ?></td>
                    <td><?= htmlspecialchars($detail['detail_name']) ?></td>
                    <td><?= htmlspecialchars($detail['detail_value']) ?></td>
                    <td>
                        <a href="edit_service.php?id=<?= $id ?>&delete_detail=<?= $detail['id'] ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Xóa chi tiết này?');">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
