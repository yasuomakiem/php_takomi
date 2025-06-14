<?php

// Load config
$config = require_once __DIR__ . '/../config/config.php';

// Load các class cần thiết
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../controller/HomeController.php';

// Khởi tạo Database với config
$db = new Core\Database($config);
$conn = $db->connect();

$sql = "SELECT * FROM services ORDER BY id DESC LIMIT 8";
$stmt = $conn->query($sql);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($services);
// echo '</pre>';
?>


<?php
require_once __DIR__ . '/../partials/header.php';
?>

<div class="elementor-element elementor-element-91d9ab8 animated-slow e-flex e-con-boxed e-con e-parent">
    <div class="e-con-inner d-flex">
        <div class="row">
            <div class="col-6">
                <div class="row align-items-center h-100">
                    <div>
                        <div
                            class="elementor-element elementor-element-1335aa2 elementor-widget elementor-widget-heading">
                            <div class="elementor-widget-container">
                                <h1 style="font-size: 35px;font-weight: 600;color: #00712D;"
                                    class="elementor-heading-title elementor-size-default">VỀ TAKOMI
                                </h1>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-6ba420d elementor-widget elementor-widget-text-editor">
                            <div class="elementor-widget-containe">
                                <p class="pt-3" style="font-weight: 400;font-size: 16px;color: #145FAD;">Với bề dày kinh
                                    nghiệm chuyên môn cùng công
                                    nghệ kỹ
                                    thuật tiên tiến, <strong>TAKOMI</strong> là Thương hiệu thuộc
                                    <strong>Công
                                        ty Cổ
                                        phần Thương Mại Dịch Vụ Kho Vận Tuấn Khôi</strong> tự hào mang
                                    đến
                                    các
                                    giải
                                    pháp và dịch vụ toàn diện về vệ sinh và rác thải không độc
                                    hại.&nbsp;
                                </p>
                                <p style="font-weight: 400;font-size: 16px;color: #145FAD;">Chúng tôi quy tụ đội ngũ
                                    nhân sự chuyên
                                    nghiệp,
                                    giàu
                                    chuyên môn và luôn sẵn sàng vượt qua mọi thách thức để triển khai dự
                                    án
                                    hiệu
                                    quả, mang đến cho khách hàng những giải pháp vượt trội. Với tinh
                                    thần
                                    đồng
                                    hành
                                    và cam kết lâu dài, chúng tôi hân hạnh cùng Quý Khách hàng xây dựng
                                    một
                                    tương
                                    lai bền vững, phát triển mạnh mẽ.</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-304938b elementor-widget elementor-widget-button">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a class="elementor-button elementor-button-link elementor-size-sm" style="background-color: #00712D;
                                        font-size: 16px;
                                        font-weight: 500;
                                        border-radius: 8px 8px 8px 8px;" href="https://takomi.vn/gioi-thieu/">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">VỀ CHÚNG TÔI</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-6">
                <div class="elementor-element elementor-element-aa16e9b elementor-widget elementor-widget-image">
                    <div class="p-3">
                        <img decoding="async" width="736" height="736"
                            src="https://takomi.vn/wp-content/uploads/2025/05/VE-TAKOMI.jpg"
                            class="elementor-animation-grow attachment-full size-full wp-image-441" alt=""
                            srcset="https://takomi.vn/wp-content/uploads/2025/05/VE-TAKOMI.jpg 736w, https://takomi.vn/wp-content/uploads/2025/05/VE-TAKOMI-300x300.jpg 300w, https://takomi.vn/wp-content/uploads/2025/05/VE-TAKOMI-150x150.jpg 150w"
                            sizes="(max-width: 736px) 100vw, 736px">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<div class="elementor-element elementor-element-91d9ab8 animated-slow e-flex e-con-boxed e-con e-parent">
    <div class="e-con-inner d-flex">
        <div class="elementor-element elementor-element-2968604 elementor-widget elementor-widget-heading">
            <div class="elementor-widget-container">
                <h2 class="elementor-heading-title elementor-size-default text-center">
                    DỊCH VỤ CỦA CHÚNG TÔI
                </h2>
            </div>
        </div>
        <div
            class="elementor-element elementor-element-e699634 elementor-grid-4 elementor-posts--align-center elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top elementor-widget elementor-widget-posts">
            <div class="elementor-widget-container">
                <div
                    class="oelementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid elementor-has-item-rati row">
                    <?php foreach ($services as $service): ?>
                        <article
                            style="border-radius: 10px; padding: 20px; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);"
                            class="elementor-post elementor-grid-item m-3">
                            <img src="<?= htmlspecialchars($service['image']) ?>"
                                alt="<?= htmlspecialchars($service['title']) ?>">
                            <div class="elementor-post__text">
                                <h3 class="elementor-post__title mt-3">
                                    <a href="#">
                                        <?= htmlspecialchars($service['title']) ?>
                                    </a>
                                </h3>
                                <div class="elementor-post__excerpt mt-1">
                                    <p><?= htmlspecialchars($service['description']) ?></p>
                                </div>
                                <a class="elementor-post__read-more" href="#"
                                    style="color: #00712D;font-size: 13px;font-weight: 500;"
                                    aria-label="Read more about <?= htmlspecialchars($service['title']) ?>" tabindex="-1">
                                    XEM THÊM »
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
        <div class="elementor-element elementor-element-f33717f elementor-align-center elementor-widget elementor-widget-button"
            data-id="f33717f" data-element_type="widget" data-widget_type="button.default">
            <div class="elementor-widget-container">
                <div class="elementor-button-wrapper">
                    <a class="elementor-button elementor-button-link elementor-size-sm" style="background-color: #00712D;
                        font-size: 16px;
                        font-weight: 500;
                        border-radius: 8px 8px 8px 8px;" href="https://www.facebook.com/messages/t/624913410704455"
                        target="_blank" rel="noopener">
                        <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-text">LIÊN HỆ NGAY</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="d-flex mt-5" style="background-color: #145FAD;">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="elementor-element elementor-element-bb269d3 e-con-full e-flex e-con e-child"
                    data-id="bb269d3" data-element_type="container">
                    <div class="elementor-element elementor-element-45b99f0 elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon"
                        data-id="45b99f0" data-element_type="widget" data-widget_type="icon.default">
                        <div class="elementor-widget-container">
                            <div class="row justify-content-center mb-4 mt-4">
                                <div class="elementor-icon" style="background-color: #FFFFFF;color: #145FAD;">
                                    <svg style="fill: #145FAD;" aria-hidden="true"
                                        class="e-font-icon-svg e-far-file-alt" viewBox="0 0 384 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e1faff0 elementor-widget elementor-widget-counter"
                        data-id="e1faff0" data-element_type="widget" data-widget_type="counter.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-counter">
                                <div class="elementor-counter-title text-white">DỰ ÁN</div>
                                <div class="elementor-counter-number-wrapper">
                                    <span class="elementor-counter-number-prefix"></span>
                                    <span class="elementor-counter-number text-white" data-duration="3000"
                                        data-to-value="150" data-from-value="0" data-delimiter=",">150</span>
                                    <span class="elementor-counter-number-suffix text-white">+</span>
                                </div>
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
                                <div class="elementor-icon" style="background-color: #FFFFFF;color: #145FAD;">
                                    <svg style="fill: #145FAD;" aria-hidden="true"
                                        class="e-font-icon-svg e-far-thumbs-up" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-56bd88f elementor-widget elementor-widget-counter"
                        data-id="56bd88f" data-element_type="widget" data-widget_type="counter.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-counter">
                                <div class="elementor-counter-title text-white">HÀI LÒNG</div>
                                <div class="elementor-counter-number-wrapper">
                                    <span class="elementor-counter-number-prefix"></span>
                                    <span class="elementor-counter-number text-white" data-duration="3000"
                                        data-to-value="100" data-from-value="0" data-delimiter=",">100</span>
                                    <span class="elementor-counter-number-suffix text-white">%</span>
                                </div>
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
                                <div class="elementor-icon" style="background-color: #FFFFFF;color: #145FAD;">
                                    <svg style="fill: #145FAD;" aria-hidden="true" class="e-font-icon-svg e-far-user"
                                        viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-8340011 elementor-widget elementor-widget-counter"
                        data-id="8340011" data-element_type="widget" data-widget_type="counter.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-counter">
                                <div class="elementor-counter-title text-white">CHUYÊN GIA</div>
                                <div class="elementor-counter-number-wrapper">
                                    <span class="elementor-counter-number-prefix"></span>
                                    <span class="elementor-counter-number text-white" data-duration="3000"
                                        data-to-value="20" data-from-value="0" data-delimiter=",">20</span>
                                    <span class="elementor-counter-number-suffix text-white">+</span>
                                </div>
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