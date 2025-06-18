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

// Nếu form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $category_id = (int)($_POST['category_id'] ?? 0);

    // Giữ ảnh cũ mặc định
    $image = $service['image'];

    // Nếu có file upload mới
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $tmpName = $_FILES['image']['tmp_name'];
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;

        // Di chuyển file upload
        if (move_uploaded_file($tmpName, $targetPath)) {
            $image = 'uploads/' . $fileName;
        }
    }

    // Cập nhật DB
    $sql = "UPDATE services SET name = :name, image = :image, category_id = :category_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':image' => $image,
        ':category_id' => $category_id,
        ':id' => $id
    ]);

    // Chuyển về trang danh sách
    header('Location: ../admin.php?module=dich-vu');
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
            <label>Hình ảnh (Tải file mới nếu muốn thay đổi)</label>
            <input type="file" name="image" class="form-control">

            <?php if (!empty($service['image'])): ?>
                <p class="mt-2">Ảnh hiện tại:</p>
                <image src="../<?= htmlspecialchars($service['image']) ?>" alt="Hình hiện tại" class="image-thumbnail" style="max-width: 200px;">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"
                        <?= $category['id'] == $service['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="../admin.php?module=dich-vu" class="btn btn-secondary">Quay lại</a>
    </form>
</body>
</html>
