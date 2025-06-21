<?php
$config = require __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();
$sql = "SELECT * FROM users WHERE id = 0";
$stmt = $conn->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<footer style="background:#EAEAEA;">
    <div class="elementor-element elementor-element-91d9ab8 animated-slow e-flex e-con-boxed e-con e-parent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="elementor-element elementor-element-92b5f24 e-con-full e-flex e-con e-child"
                        data-id="92b5f24" data-element_type="container">
                        <div class="elementor-element elementor-element-b8ec42e elementor-widget elementor-widget-theme-site-logo elementor-widget-image"
                            data-id="b8ec42e" data-element_type="widget" data-widget_type="theme-site-logo.default">
                            <div class="elementor-widget-container">
                                <a href="https://takomi.vn">
                                    <img width="1870" height="404"
                                        src="https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01.png"
                                        class="attachment-full size-full wp-image-313" alt=""
                                        srcset="https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01.png 1870w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-300x65.png 300w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-1024x221.png 1024w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-150x32.png 150w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-768x166.png 768w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-1536x332.png 1536w"
                                        sizes="(max-width: 1870px) 100vw, 1870px"> </a>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-5ec70f5 elementor-widget elementor-widget-heading mt-3">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default" style="font-size: 20px;
                                    font-weight: 600;
                                    line-height: 30px;
                                    color: #145FAD;">
                                    <?= htmlspecialchars($user['name']) ?>
                                </h2>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-7d23212 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items mt-3">
                                    <li class="mt-1 elementor-icon-list-item">
                                        <a href="tel:<?= ($user['phone']) ?>">
                                            <span class="elementor-icon-list-icon">
                                                <svg style="fill: #145FAD;" aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-phone-alt" viewBox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z">
                                                    </path>
                                                </svg> </span>
                                            <span class="elementor-icon-list-text" style="color: #145FAD;">Hotline:
                                                <?= htmlspecialchars($user['phone']) ?></span>
                                        </a>
                                    </li>
                                    <li class="mt-1 elementor-icon-list-item">
                                        <a href="mailto:<?= ($user['email']) ?>">

                                            <span class="elementor-icon-list-icon">
                                                <svg style="fill: #145FAD;" aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-envelope" viewBox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                                    </path>
                                                </svg> </span>
                                            <span class="elementor-icon-list-text" style="color: #145FAD;">Email:
                                                <?= htmlspecialchars($user['email']) ?></span>
                                        </a>
                                    </li>
                                    <li class="mt-1 elementor-icon-list-item">
                                        <span class="elementor-icon-list-icon">
                                            <svg style="fill: #145FAD;" aria-hidden="true"
                                                class="e-font-icon-svg e-fas-map-marker-alt" viewBox="0 0 384 512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
                                                </path>
                                            </svg> </span>
                                        <span class="elementor-icon-list-text" style="color: #145FAD;">Địa chỉ: Số 143
                                            LK5 KĐT Waterfront, Lê
                                            Chân, Hải Phòng</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="elementor-element elementor-element-e352b03 e-con-full e-flex e-con e-child"
                        data-id="e352b03" data-element_type="container">
                        <div class="elementor-element elementor-element-c40fb08 elementor-widget elementor-widget-heading"
                            data-id="c40fb08" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default text-center" style="    font-size: 20px;
                                    font-weight: 600;
                                    line-height: 30px;
                                    color: #145FAD;">ĐĂNG KÝ NHẬN TIN</h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-64f4e3a elementor-button-align-stretch elementor-widget elementor-widget-form"
                            data-id="64f4e3a" data-element_type="widget"
                            data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                            data-widget_type="form.default">
                            <div class="elementor-widget-container">
                                <style>
                                    .elementor-form input {
                                        border: 1px solid #69727d;
                                        flex-grow: 1;
                                        max-width: 100%;
                                        vertical-align: middle;
                                        width: 100%;
                                        background-color: #ffffff;
                                        font-weight: 400;
                                        color: #000000;
                                        margin-top: 16px;
                                    }
                                </style>
                                <form class="elementor-form" action="/public/action/save_contact.php"  method="post" name="New Form">
                                    <div class="elementor-form-fields-wrapper elementor-labels-">
                                        <div
                                            class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_f262d60 elementor-col-100 elementor-field-required">
                                            <label for="form-field-field_f262d60"
                                                class="elementor-field-label elementor-screen-only">
                                                Họ và tên </label>
                                            <input size="1" type="text" name="form_fields[field_f262d60]"
                                                id="form-field-field_f262d60"
                                                class="elementor-field elementor-size-sm  elementor-field-textual"
                                                placeholder="Họ và tên *" required="required">
                                        </div>
                                        <div
                                            class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_b66f8f9 elementor-col-100 elementor-field-required">
                                            <label for="form-field-field_b66f8f9"
                                                class="elementor-field-label elementor-screen-only">
                                                Số điện thoại </label>
                                            <input size="1" type="tel" name="form_fields[field_b66f8f9]"
                                                id="form-field-field_b66f8f9"
                                                class="elementor-field elementor-size-sm  elementor-field-textual"
                                                placeholder="Số điện thoại *" required="required"
                                                pattern="[0-9()#&amp;+*-=.]+"
                                                title="Only numbers and phone characters (#, -, *, etc) are accepted.">

                                        </div>
                                        <div
                                            class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_0300828 elementor-col-100">
                                            <label for="form-field-field_0300828"
                                                class="elementor-field-label elementor-screen-only">
                                                Email </label>
                                            <input size="1" type="email" name="form_fields[field_0300828]"
                                                id="form-field-field_0300828"
                                                class="elementor-field elementor-size-sm  elementor-field-textual"
                                                placeholder="Email">
                                        </div>
                                        <div
                                            class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_0c34597 elementor-col-100 mt-3">
                                            <label for="form-field-field_0c34597"
                                                class="elementor-field-label elementor-screen-only">
                                                Lời nhắn </label>
                                            <textarea class="elementor-field-textual elementor-field  elementor-size-sm"
                                                name="form_fields[field_0c34597]" id="form-field-field_0c34597" rows="4"
                                                placeholder="Lời nhắn"></textarea>
                                        </div>
                                        <div
                                            class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons mt-4">
                                            <button class="elementor-button elementor-size-sm" type="submit" style="background-color: #00712D;color: #ffffff;">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">ĐĂNG KÝ</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <iframe class="w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.773818170317!2d105.77121248506292!3d10.03551434683972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895358d1e21b%3A0x7950cbe9ace4d06c!2zVMOSQSBOSMOAIFBWQ09NQkFOSyBD4bqmTiBUSMag!5e0!3m2!1svi!2s!4v1749920929979!5m2!1svi!2s"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- <p class="w-100 text-center pt-2 mb-2">© 2025 -  <a target="_blank" href="https://www.facebook.com/goat.s.ngu">Unicorn to Goat</a></p> -->
</body>

</html>