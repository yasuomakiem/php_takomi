<?php
// 1️⃣ Load cấu hình
$config = require __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();
$sql = "SELECT * FROM users WHERE id = 0";
$stmt = $conn->query($sql);
$company = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1 class="text-center mt-3">Thông tin hiển thị trang chủ và trang giới thiệu</h1>

<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= htmlspecialchars($company['id']) ?></td>
        </tr>
        <tr>
            <th>Tên công ty</th>
            <td><?= htmlspecialchars($company['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($company['email']) ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?= htmlspecialchars($company['address']) ?></td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><?= htmlspecialchars($company['description']) ?></td>
        </tr>
        <tr>
            <th>Điện thoại</th>
            <td><?= htmlspecialchars($company['phone']) ?></td>
        </tr>
        <tr>
            <th>Hotline</th>
            <td><?= htmlspecialchars($company['hotline']) ?></td>
        </tr>
        <tr>
            <th>Mã số thuế</th>
            <td><?= htmlspecialchars($company['tax_code']) ?></td>
        </tr>
    </table>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
        Chỉnh sửa thông tin
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="update_company.php">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin công ty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Các input -->
          <input type="hidden" name="id" value="<?= htmlspecialchars($company['id']) ?>">

          <div class="form-group">
            <label>Tên công ty</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($company['name']) ?>">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($company['email']) ?>">
          </div>

          <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($company['address']) ?>">
          </div>

          <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description"><?= htmlspecialchars($company['description']) ?></textarea>
          </div>

          <div class="form-group">
            <label>Điện thoại</label>
            <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($company['phone']) ?>">
          </div>

          <div class="form-group">
            <label>Hotline</label>
            <input type="text" class="form-control" name="hotline" value="<?= htmlspecialchars($company['hotline']) ?>">
          </div>

          <div class="form-group">
            <label>Mã số thuế</label>
            <input type="text" class="form-control" name="tax_code" value="<?= htmlspecialchars($company['tax_code']) ?>">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap 4 JS + jQuery + Popper.js -->
<!-- Bootstrap 4 JS + jQuery + Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
