<?php
// 1) Load config
$config = require __DIR__ . '/../config/config.php';

// 2) Load class
require_once __DIR__ . '/../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();
$sql = "SELECT * FROM users WHERE id = 0";
$stmt = $conn->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

require_once __DIR__ . '/../partials/header.php';
?>

<link rel="stylesheet" href="../css/tin_tuc.css">

<!-- Banner -->
<div style="
  height: 300px;
  background-image: url('/img/bg_tin_tuc.webp');
  background-size: cover;
  background-position: center;
">
    <h1 class="text-center pt-5">Liên hệ</h1>
    <h2 class="text-center pt-5">Trang chủ / Liên hệ</h2>
</div>
<div class="d-flex pt-3">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="elementor-element elementor-element-bb269d3 e-con-full e-flex e-con e-child"
                    data-id="bb269d3" data-element_type="container">
                    <div class="elementor-element elementor-element-45b99f0 elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon"
                        data-id="45b99f0" data-element_type="widget" data-widget_type="icon.default">
                        <div class="elementor-widget-container">
                            <div class="row justify-content-center mb-4 mt-4">
                                <div class="elementor-icon" style="background-color: #145FAD;color: #145FAD;">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-phone-alt"
                                        viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e1faff0 elementor-widget elementor-widget-counter">
                        <div class="elementor-widget-container">
                            <div class="elementor-counter">
                                <h6 style="color: #145FAD;" class="text-center "><?= htmlspecialchars($user['hotline']) ?></h5>
                                <h5 style="color: #145FAD;" class="text-center mb-0">HOTLINE</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="elementor-element elementor-element-d66eb27 e-con-full e-flex e-con e-child"
                    data-id="d66eb27" data-element_type="container">
                    <div class="elementor-element elementor-element-f855c7b elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon"
                        data-id="f855c7b" data-element_type="widget" data-widget_type="icon.default">
                        <div class="elementor-widget-container">
                            <div class="row justify-content-center mb-4 mt-4">
                                <div class="elementor-icon" style="background-color: #145FAD;color: #145FAD;">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-envelope" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e1faff0 elementor-widget elementor-widget-counter">
                        <div class="elementor-widget-container">
                            <div class="elementor-counter">
                                <h6 style="color: #145FAD;" class="text-center "><?= htmlspecialchars($user['email']) ?></h5>
                                <h5 style="color: #145FAD;" class="text-center mb-0">EMAIL</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="elementor-element elementor-element-c0642ad e-con-full e-flex e-con e-child"
                    data-id="c0642ad" data-element_type="container">
                    <div class="elementor-element elementor-element-c969cfb elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon"
                        data-id="c969cfb" data-element_type="widget" data-widget_type="icon.default">
                        <div class="elementor-widget-container">
                            <div class="row justify-content-center mb-4 mt-4">
                                <div class="elementor-icon" style="background-color: #145FAD;color: #145FAD;">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-map-marker-alt" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e1faff0 elementor-widget elementor-widget-counter">
                        <div class="elementor-widget-container">
                            <div class="elementor-counter">
                                <h6 style="color: #145FAD;" class="text-center "><?= htmlspecialchars($user['address']) ?></h5>
                                <h5 style="color: #145FAD;" class="text-center mb-0">ĐỊA CHỈ</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>