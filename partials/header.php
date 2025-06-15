<?php
session_start();

// 1️⃣ Load cấu hình
$config = require __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

$db = new Core\Database($config);
$conn = $db->connect();
$sql = "SELECT * FROM users WHERE id = 0";
$stmt = $conn->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$menuSql = "SELECT * FROM menus WHERE position = :position ORDER BY `sort_order` ASC";
$menuStmt = $conn->prepare($menuSql);
$position = 'header';
$menuStmt->bindParam(':position', $position, PDO::PARAM_STR);
$menuStmt->execute();
$menus = $menuStmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Trang Admin</title>
    <!-- CSS dùng chung -->
    <link rel="stylesheet" href="../css/bs-4.css">
    <link rel="stylesheet" href="../css/custom-frontend.min.css">
    <link rel="stylesheet" href="../css/custom-pro-widget-nav-menu.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
    <?php
    require_once __DIR__ . '/../partials/menu_contact.php';
    ?>
    <header>
        <div data-elementor-type="header" data-elementor-id="79"
            class="elementor elementor-79 elementor-location-header" data-elementor-post-type="elementor_library">
            <div class="elementor-element elementor-element-9c1389e elementor-hidden-mobile e-flex e-con-boxed e-con e-parent"
                data-id="9c1389e" data-element_type="container"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-eea999b e-con-full e-flex e-con e-child"
                        data-id="eea999b" data-element_type="container">
                        <div class="elementor-element elementor-element-9a641f0 elementor-widget elementor-widget-text-editor"
                            data-id="9a641f0" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <p><?= htmlspecialchars($user['description']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-eea999b e-con-full e-flex e-con e-child"
                        data-id="eea999b" data-element_type="container">
                        <div class="elementor-element elementor-element-9a641f0 elementor-widget elementor-widget-text-editor"
                            data-id="9a641f0" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container text-center">
                                <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-cc0b76a e-con-full e-flex e-con e-child"
                        data-id="cc0b76a" data-element_type="container">
                        <div class="elementor-element elementor-element-42bf48c elementor-widget elementor-widget-text-editor"
                            data-id="42bf48c" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <p>Địa chỉ: <?= htmlspecialchars($user['address']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="position: sticky;" class="elementor-element elementor-element-5e983c4 elementor-hidden-mobile e-flex e-con-boxed e-con e-parent"
                data-id="5e983c4" data-element_type="container"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;widescreen&quot;,&quot;desktop&quot;,&quot;laptop&quot;,&quot;tablet_extra&quot;,&quot;tablet&quot;,&quot;mobile_extra&quot;,&quot;mobile&quot;],&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0,&quot;sticky_anchor_link_offset&quot;:0}">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-38dd396 e-con-full e-flex e-con e-child"
                        data-id="38dd396" data-element_type="container">
                        <div class="elementor-element elementor-element-dbb6509 elementor-widget elementor-widget-theme-site-logo elementor-widget-image"
                            data-id="dbb6509" data-element_type="widget" data-widget_type="theme-site-logo.default">
                            <div class="elementor-widget-container">
                                <a href="https://takomi.vn">
                                    <img fetchpriority="high" width="1870" height="404"
                                        src="https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01.png"
                                        class="attachment-full size-full wp-image-313" alt=""
                                        srcset="https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01.png 1870w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-300x65.png 300w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-1024x221.png 1024w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-150x32.png 150w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-768x166.png 768w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-1536x332.png 1536w"
                                        sizes="(max-width: 1870px) 100vw, 1870px" /> </a>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-a452dd8 e-con-full e-flex e-con e-child"
                        data-id="a452dd8" data-element_type="container">
                        <div class="elementor-element elementor-element-7c89c62 elementor-nav-menu--dropdown-mobile elementor-nav-menu--stretch elementor-nav-menu__align-end elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger elementor-widget elementor-widget-nav-menu"
                            data-id="7c89c62" data-element_type="widget"
                            data-settings="{&quot;submenu_icon&quot;:{&quot;value&quot;:&quot;&lt;svg class=\&quot;e-font-icon-svg e-fas-angle-down\&quot; viewBox=\&quot;0 0 320 512\&quot; xmlns=\&quot;http:\/\/www.w3.org\/2000\/svg\&quot;&gt;&lt;path d=\&quot;M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z\&quot;&gt;&lt;\/path&gt;&lt;\/svg&gt;&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;full_width&quot;:&quot;stretch&quot;,&quot;layout&quot;:&quot;horizontal&quot;,&quot;toggle&quot;:&quot;burger&quot;}"
                            data-widget_type="nav-menu.default">
                            <div class="elementor-widget-container">
                                <nav aria-label="Menu"
                                    class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-text e--animation-grow">
                                    <ul id="menu-1-7c89c62" class="elementor-nav-menu">
                                        <?php
                                        $currentPath = $_SERVER['REQUEST_URI'];
                                        ?>
                                        <?php foreach ($menus as $menu): ?>
                                            <?php
                                            // So sánh: nếu menu['url'] là URL đầy đủ
                                            $isActive = ($menu['url'] == $currentPath) ? 'elementor-item-active' : '';
                                            ?>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                <a href="<?= htmlspecialchars($menu['url']) ?>"
                                                    class="elementor-item <?= $isActive ?>">
                                                    <?= htmlspecialchars($menu['name']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>
                                <div class="elementor-menu-toggle" role="button" tabindex="0" aria-label="Menu Toggle"
                                    aria-expanded="false">
                                    <svg aria-hidden="true" role="presentation"
                                        class="elementor-menu-toggle__icon--open e-font-icon-svg e-eicon-menu-bar"
                                        viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M104 333H896C929 333 958 304 958 271S929 208 896 208H104C71 208 42 237 42 271S71 333 104 333ZM104 583H896C929 583 958 554 958 521S929 458 896 458H104C71 458 42 487 42 521S71 583 104 583ZM104 833H896C929 833 958 804 958 771S929 708 896 708H104C71 708 42 737 42 771S71 833 104 833Z">
                                        </path>
                                    </svg><svg aria-hidden="true" role="presentation"
                                        class="elementor-menu-toggle__icon--close e-font-icon-svg e-eicon-close"
                                        viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M742 167L500 408 258 167C246 154 233 150 217 150 196 150 179 158 167 167 154 179 150 196 150 212 150 229 154 242 171 254L408 500 167 742C138 771 138 800 167 829 196 858 225 858 254 829L496 587 738 829C750 842 767 846 783 846 800 846 817 842 829 829 842 817 846 804 846 783 846 767 842 750 829 737L588 500 833 258C863 229 863 200 833 171 804 137 775 137 742 167Z">
                                        </path>
                                    </svg>
                                </div>
                                <nav class="elementor-nav-menu--dropdown elementor-nav-menu__container"
                                    aria-hidden="true">
                                    <ul id="menu-2-7c89c62" class="elementor-nav-menu">
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                            <a href="" class="elementor-item elementor-item-active">Trang chủ</a>
                                        </li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                            <a href="https://takomi.vn/gioi-thieu/" class="elementor-item"
                                                tabindex="-1">Giới thiệu</a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e9982dc e-con-full e-flex e-con e-child"
                        data-id="e9982dc" data-element_type="container">
                        <div class="elementor-element elementor-element-fcf3e3a elementor-widget elementor-widget-shortcode"
                            data-id="fcf3e3a" data-element_type="widget" data-widget_type="shortcode.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-shortcode">
                                    <div class="mcbompe-search-wrapper" id="mcbompe-search-1498">
                                        <div class="mcbompe-search-trigger"><svg aria-hidden="true"
                                                class="e-font-icon-svg e-fas-search" viewBox="0 0 512 512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                                </path>
                                            </svg><span class="mcbompe-search-text"></span></div>
                                        <div class="e-search-overlay">
                                            <form method="get" action="https://takomi.vn"
                                                class="e-search-input-wrapper"><input id="search-mcbompe-search-1498"
                                                    placeholder="Tìm kiếm..." class="e-search-input no-icon-label"
                                                    type="search" name="s" value="" autocomplete="off" role="combobox"
                                                    aria-autocomplete="list" aria-expanded="false"
                                                    aria-controls="results-mcbompe-search-1498" aria-haspopup="listbox">
                                                <div class="e-font-icon-svg e-fas-times hidden"> </div>
                                                <button class="e-search-submit  " type="submit">

                                                    <span class="">
                                                        Tìm kiếm </span>
                                                </button><output id="results-mcbompe-search-1498"
                                                    class="e-search-results-container hide-loader" aria-live="polite"
                                                    aria-atomic="true" aria-label="Results for search" tabindex="0">
                                                    <div class="e-search-results"></div>
                                                    <div class="e-search-loader"><svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 28 28">
                                                            <path fill-rule="evenodd"
                                                                d="M14 .188c.587 0 1.063.475 1.063 1.062V5.5a1.063 1.063 0 0 1-2.126 0V1.25c0-.587.476-1.063 1.063-1.063ZM4.182 4.181a1.063 1.063 0 0 1 1.503 0L8.73 7.228A1.062 1.062 0 1 1 7.228 8.73L4.182 5.685a1.063 1.063 0 0 1 0-1.503Zm19.636 0a1.063 1.063 0 0 1 0 1.503L20.772 8.73a1.062 1.062 0 1 1-1.502-1.502l3.045-3.046a1.063 1.063 0 0 1 1.503 0ZM.188 14c0-.587.475-1.063 1.062-1.063H5.5a1.063 1.063 0 0 1 0 2.126H1.25A1.063 1.063 0 0 1 .187 14Zm21.25 0c0-.587.475-1.063 1.062-1.063h4.25a1.063 1.063 0 0 1 0 2.126H22.5A1.063 1.063 0 0 1 21.437 14ZM8.73 19.27a1.062 1.062 0 0 1 0 1.502l-3.045 3.046a1.063 1.063 0 0 1-1.503-1.503l3.046-3.046a1.063 1.063 0 0 1 1.502 0Zm10.54 0a1.063 1.063 0 0 1 1.502 0l3.046 3.045a1.063 1.063 0 0 1-1.503 1.503l-3.046-3.046a1.063 1.063 0 0 1 0-1.502ZM14 21.438c.587 0 1.063.475 1.063 1.062v4.25a1.063 1.063 0 0 1-2.126 0V22.5c0-.587.476-1.063 1.063-1.063Z">
                                                            </path>
                                                        </svg></div>
                                                </output>
                                            </form>
                                        </div>
                                    </div>
                                    <style>
                                        .mcbompe-search-wrapper {
                                            position: relative;
                                            display: inline-block;
                                        }

                                        .e-search-input {
                                            flex: none;
                                            max-width: 82%;
                                        }

                                        .e-search-results {
                                            margin-top: 10px;
                                            position: absolute;
                                            background: #fff;
                                            padding: 20px;
                                            top: 100%;
                                            left: 0;
                                            width: 100%;
                                        }

                                        .e-search-submit {
                                            color: #000000;
                                            border: 1px solid #000000;
                                        }

                                        .e-search-submit:hover {
                                            background: #000000;
                                        }

                                        .e-search-result a {
                                            color: #000000;
                                        }

                                        .e-search-results:empty {
                                            display: none;
                                        }

                                        .mcbompe-search-trigger {
                                            cursor: pointer;
                                            display: flex;
                                            align-items: center;
                                            gap: 8px;
                                        }

                                        .elementor-shortcode {
                                            display: flex;
                                        }

                                        .mcbompe-search-trigger svg {
                                            width: 20px;
                                            height: 20px;
                                            fill: #145FAD;
                                        }

                                        .e-search-overlay {
                                            z-index: 9999;
                                            position: fixed;
                                            width: 100%;
                                            height: 100%;
                                            padding-top: 100px;
                                            background: #00000099;
                                            top: 0;
                                            left: 0;
                                            display: none;
                                            align-items: flex-start;
                                            justify-content: center;
                                        }

                                        .e-search-overlay.active {
                                            display: flex;
                                        }

                                        .e-search-input-wrapper {
                                            position: relative;
                                            top: 0;
                                            right: 0;
                                            width: 50%;
                                            background: #fff;
                                            padding: 10px;
                                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                                            border-radius: 4px;
                                            margin-top: 5px;
                                            display: flex;
                                            gap: 10px;
                                        }

                                        .e-search-input-wrapper.active {
                                            display: block;
                                        }

                                        .e-search-input {
                                            width: 100%;
                                            padding: 8px;
                                            border: 1px solid #ddd;
                                            border-radius: 4px;
                                        }

                                        .e-font-icon-svg.e-fas-times {
                                            position: absolute;
                                            right: 10px;
                                            top: 50%;
                                            transform: translateY(-50%);
                                            width: 16px;
                                            height: 16px;
                                            cursor: pointer;
                                        }

                                        .e-font-icon-svg.e-fas-times.hidden {
                                            display: none;
                                        }

                                        .e-search-results-container {
                                            margin-top: 10px;
                                        }

                                        .e-search-loader {
                                            display: none;
                                            text-align: center;
                                            padding: 10px;
                                        }

                                        .e-search-loader svg {
                                            width: 24px;
                                            height: 24px;
                                            animation: spin 1s linear infinite;
                                        }

                                        @keyframes spin {
                                            0% {
                                                transform: rotate(0deg);
                                            }

                                            100% {
                                                transform: rotate(360deg);
                                            }
                                        }

                                        .hide-loader .e-search-loader {
                                            display: none;
                                        }

                                        @media (max-width: 768px) {
                                            .e-search-input-wrapper {
                                                width: 90%;
                                            }

                                            .e-search-input {
                                                flex: 1;
                                            }
                                        }
                                    </style>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const searchWrapper = document.querySelector("#mcbompe-search-1498 .mcbompe-search-trigger");
                                            const searchInput = document.querySelector("#mcbompe-search-1498 .e-search-overlay");
                                            const clearButton = document.querySelector("#mcbompe-search-1498 .e-fas-times");
                                            const input = document.querySelector("#search-mcbompe-search-1498");
                                            const resultsContainer = document.querySelector("#results-mcbompe-search-1498 .e-search-results");
                                            // Close search overlay when clicking outside search input wrapper
                                            searchInput.addEventListener("click", function (e) {
                                                if (!e.target.closest(".e-search-input-wrapper")) {
                                                    searchInput.classList.remove("active");
                                                }
                                            });
                                            if (searchWrapper && searchInput) {
                                                searchWrapper.addEventListener("click", function () {
                                                    searchInput.classList.toggle("active");
                                                    if (searchInput.classList.contains("active")) {
                                                        input.focus();
                                                    }
                                                });
                                            }

                                            // Close search when clicking outside
                                            document.addEventListener("click", function (e) {
                                                if (!searchInput.contains(e.target) && !searchWrapper.contains(e.target)) {
                                                    searchInput.classList.remove("active");
                                                }
                                            });

                                            // Handle input changes
                                            let searchTimeout;
                                            input.addEventListener("input", function () {
                                                clearButton.classList.toggle("hidden", !this.value);

                                                clearTimeout(searchTimeout);
                                                searchTimeout = setTimeout(() => {
                                                    if (this.value.length >= 3) {
                                                        performSearch(this.value);
                                                    } else {
                                                        resultsContainer.innerHTML = "";
                                                    }
                                                }, 500);
                                            });

                                            // Clear search
                                            clearButton.addEventListener("click", function () {
                                                input.value = "";
                                                resultsContainer.innerHTML = "";
                                                this.classList.add("hidden");
                                            });

                                            // Perform search
                                            function performSearch(query) {
                                                resultsContainer.innerHTML = "<div class=\"e-search-loader\">Searching...</div>";

                                                fetch(`${window.location.origin}/wp-json/wp/v2/search?search=${encodeURIComponent(query)}&per_page=5&type=post`)
                                                    .then(response => response.json())
                                                    .then(results => {
                                                        resultsContainer.innerHTML = results.length ?
                                                            results.map(result => `
                                <div class="e-search-result">
                                    <a href="${result.url}">${result.title}</a>
                                </div>
                            `).join("") :
                                                            "<div class=\"no-results\">No results found</div>";
                                                    })
                                                    .catch(error => {
                                                        resultsContainer.innerHTML = "<div class=\"error\">Error performing search</div>";
                                                    });
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-d8875c6 elementor-hidden-widescreen elementor-hidden-desktop elementor-hidden-laptop elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra e-flex e-con-boxed e-con e-parent"
                data-id="d8875c6" data-element_type="container"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;widescreen&quot;,&quot;desktop&quot;,&quot;laptop&quot;,&quot;tablet_extra&quot;,&quot;tablet&quot;,&quot;mobile_extra&quot;,&quot;mobile&quot;],&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0,&quot;sticky_anchor_link_offset&quot;:0}">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-106c187 e-con-full e-flex e-con e-child"
                        data-id="106c187" data-element_type="container">
                        <div class="elementor-element elementor-element-5b28534 elementor-nav-menu--dropdown-mobile elementor-nav-menu--stretch elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger elementor-widget elementor-widget-nav-menu"
                            data-id="5b28534" data-element_type="widget"
                            data-settings="{&quot;submenu_icon&quot;:{&quot;value&quot;:&quot;&lt;svg class=\&quot;e-font-icon-svg e-fas-angle-down\&quot; viewBox=\&quot;0 0 320 512\&quot; xmlns=\&quot;http:\/\/www.w3.org\/2000\/svg\&quot;&gt;&lt;path d=\&quot;M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z\&quot;&gt;&lt;\/path&gt;&lt;\/svg&gt;&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;full_width&quot;:&quot;stretch&quot;,&quot;layout&quot;:&quot;horizontal&quot;,&quot;toggle&quot;:&quot;burger&quot;}"
                            data-widget_type="nav-menu.default">
                            <div class="elementor-widget-container">
                                <nav aria-label="Menu"
                                    class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-text e--animation-grow">
                                    <ul id="menu-1-5b28534" class="elementor-nav-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-11 current_page_item menu-item-17">
                                            <a href="https://takomi.vn/" aria-current="page"
                                                class="elementor-item elementor-item-active">Trang chủ</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20">
                                            <a href="https://takomi.vn/gioi-thieu/" class="elementor-item">Giới
                                                thiệu</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-464">
                                            <a href="#" class="elementor-item elementor-item-anchor">Dịch vụ</a>
                                            <ul class="sub-menu elementor-nav-menu--dropdown">
                                                <li
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-26">
                                                    <a href="https://takomi.vn/category/dich-vu-ve-sinh/"
                                                        class="elementor-sub-item">Dịch vụ vệ sinh</a>
                                                    <ul class="sub-menu elementor-nav-menu--dropdown">
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-214">
                                                            <a href="https://takomi.vn/ve-sinh-cong-nghiep/"
                                                                class="elementor-sub-item">Vệ sinh công nghiệp</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-215">
                                                            <a href="https://takomi.vn/don-nha-theo-gio/"
                                                                class="elementor-sub-item">Dọn nhà theo giờ</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-216">
                                                            <a href="https://takomi.vn/giat-la-chuyen-sau/"
                                                                class="elementor-sub-item">Giặt là chuyên sâu</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-217">
                                                            <a href="https://takomi.vn/ve-sinh-thong-tac-duong-ong/"
                                                                class="elementor-sub-item">Vệ sinh, thông tắc đường
                                                                ống</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-218">
                                                            <a href="https://takomi.vn/ve-sinh-cong-ty-khach-san-khu-cong-nghiep-toa-nha-cao-tang/"
                                                                class="elementor-sub-item">Vệ sinh Công ty, khách sạn,
                                                                khu công nghiệp, toà nhà cao tầng</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-32">
                                                    <a href="https://takomi.vn/category/thu-gom-rac-thai-khong-doc-hai/"
                                                        class="elementor-sub-item">Thu gom rác thải không độc hại</a>
                                                    <ul class="sub-menu elementor-nav-menu--dropdown">
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-219">
                                                            <a href="https://takomi.vn/cung-cap-xe-hut-chat-thai/"
                                                                class="elementor-sub-item">Cung cấp xe hút chất thải</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-220">
                                                            <a href="https://takomi.vn/thu-gom-rac-thai-tu-ho-gia-dinh-va-co-so-kinh-doanh/"
                                                                class="elementor-sub-item">Thu gom rác thải từ hộ gia
                                                                đình và cơ sở kinh doanh</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-221">
                                                            <a href="https://takomi.vn/hut-be-phot-thoat-nuoc-va-xu-ly-nuoc-thai/"
                                                                class="elementor-sub-item">Hút bể phốt, thoát nước và xử
                                                                lý nước thải</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-666">
                                                            <a href="https://takomi.vn/thu-gom-phe-lieu/"
                                                                class="elementor-sub-item">Thu gom phế liệu</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40">
                                            <a href="https://takomi.vn/du-an/" class="elementor-item">Dự án</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-636">
                                            <a href="https://takomi.vn/bang-gia/" class="elementor-item">Bảng giá</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-42">
                                            <a href="https://takomi.vn/category/tin-tuc/" class="elementor-item">Tin
                                                tức</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-41">
                                            <a href="https://takomi.vn/lien-he/" class="elementor-item">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="elementor-menu-toggle" role="button" tabindex="0" aria-label="Menu Toggle"
                                    aria-expanded="false">
                                    <svg aria-hidden="true" role="presentation"
                                        class="elementor-menu-toggle__icon--open e-font-icon-svg e-eicon-menu-bar"
                                        viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M104 333H896C929 333 958 304 958 271S929 208 896 208H104C71 208 42 237 42 271S71 333 104 333ZM104 583H896C929 583 958 554 958 521S929 458 896 458H104C71 458 42 487 42 521S71 583 104 583ZM104 833H896C929 833 958 804 958 771S929 708 896 708H104C71 708 42 737 42 771S71 833 104 833Z">
                                        </path>
                                    </svg><svg aria-hidden="true" role="presentation"
                                        class="elementor-menu-toggle__icon--close e-font-icon-svg e-eicon-close"
                                        viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M742 167L500 408 258 167C246 154 233 150 217 150 196 150 179 158 167 167 154 179 150 196 150 212 150 229 154 242 171 254L408 500 167 742C138 771 138 800 167 829 196 858 225 858 254 829L496 587 738 829C750 842 767 846 783 846 800 846 817 842 829 829 842 817 846 804 846 783 846 767 842 750 829 737L588 500 833 258C863 229 863 200 833 171 804 137 775 137 742 167Z">
                                        </path>
                                    </svg>
                                </div>
                                <nav class="elementor-nav-menu--dropdown elementor-nav-menu__container"
                                    aria-hidden="true">
                                    <ul id="menu-2-5b28534" class="elementor-nav-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-11 current_page_item menu-item-17">
                                            <a href="https://takomi.vn/" aria-current="page"
                                                class="elementor-item elementor-item-active" tabindex="-1">Trang chủ</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20">
                                            <a href="https://takomi.vn/gioi-thieu/" class="elementor-item"
                                                tabindex="-1">Giới thiệu</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-464">
                                            <a href="#" class="elementor-item elementor-item-anchor" tabindex="-1">Dịch
                                                vụ</a>
                                            <ul class="sub-menu elementor-nav-menu--dropdown">
                                                <li
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-26">
                                                    <a href="https://takomi.vn/category/dich-vu-ve-sinh/"
                                                        class="elementor-sub-item" tabindex="-1">Dịch vụ vệ sinh</a>
                                                    <ul class="sub-menu elementor-nav-menu--dropdown">
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-214">
                                                            <a href="https://takomi.vn/ve-sinh-cong-nghiep/"
                                                                class="elementor-sub-item" tabindex="-1">Vệ sinh công
                                                                nghiệp</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-215">
                                                            <a href="https://takomi.vn/don-nha-theo-gio/"
                                                                class="elementor-sub-item" tabindex="-1">Dọn nhà theo
                                                                giờ</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-216">
                                                            <a href="https://takomi.vn/giat-la-chuyen-sau/"
                                                                class="elementor-sub-item" tabindex="-1">Giặt là chuyên
                                                                sâu</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-217">
                                                            <a href="https://takomi.vn/ve-sinh-thong-tac-duong-ong/"
                                                                class="elementor-sub-item" tabindex="-1">Vệ sinh, thông
                                                                tắc đường ống</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-218">
                                                            <a href="https://takomi.vn/ve-sinh-cong-ty-khach-san-khu-cong-nghiep-toa-nha-cao-tang/"
                                                                class="elementor-sub-item" tabindex="-1">Vệ sinh Công
                                                                ty, khách sạn, khu công nghiệp, toà nhà cao tầng</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-32">
                                                    <a href="https://takomi.vn/category/thu-gom-rac-thai-khong-doc-hai/"
                                                        class="elementor-sub-item" tabindex="-1">Thu gom rác thải không
                                                        độc hại</a>
                                                    <ul class="sub-menu elementor-nav-menu--dropdown">
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-219">
                                                            <a href="https://takomi.vn/cung-cap-xe-hut-chat-thai/"
                                                                class="elementor-sub-item" tabindex="-1">Cung cấp xe hút
                                                                chất thải</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-220">
                                                            <a href="https://takomi.vn/thu-gom-rac-thai-tu-ho-gia-dinh-va-co-so-kinh-doanh/"
                                                                class="elementor-sub-item" tabindex="-1">Thu gom rác
                                                                thải từ hộ gia đình và cơ sở kinh doanh</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-221">
                                                            <a href="https://takomi.vn/hut-be-phot-thoat-nuoc-va-xu-ly-nuoc-thai/"
                                                                class="elementor-sub-item" tabindex="-1">Hút bể phốt,
                                                                thoát nước và xử lý nước thải</a>
                                                        </li>
                                                        <li
                                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-666">
                                                            <a href="https://takomi.vn/thu-gom-phe-lieu/"
                                                                class="elementor-sub-item" tabindex="-1">Thu gom phế
                                                                liệu</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40">
                                            <a href="https://takomi.vn/du-an/" class="elementor-item" tabindex="-1">Dự
                                                án</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-636">
                                            <a href="https://takomi.vn/bang-gia/" class="elementor-item"
                                                tabindex="-1">Bảng giá</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-42">
                                            <a href="https://takomi.vn/category/tin-tuc/" class="elementor-item"
                                                tabindex="-1">Tin tức</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-41">
                                            <a href="https://takomi.vn/lien-he/" class="elementor-item"
                                                tabindex="-1">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-c497fc2 e-con-full e-flex e-con e-child"
                        data-id="c497fc2" data-element_type="container">
                        <div class="elementor-element elementor-element-ef4a29e elementor-widget elementor-widget-theme-site-logo elementor-widget-image"
                            data-id="ef4a29e" data-element_type="widget" data-widget_type="theme-site-logo.default">
                            <div class="elementor-widget-container">
                                <a href="https://takomi.vn">
                                    <img fetchpriority="high" width="1870" height="404"
                                        src="https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01.png"
                                        class="attachment-full size-full wp-image-313" alt=""
                                        srcset="https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01.png 1870w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-300x65.png 300w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-1024x221.png 1024w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-150x32.png 150w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-768x166.png 768w, https://takomi.vn/wp-content/uploads/2025/04/logo-chinh-01-1536x332.png 1536w"
                                        sizes="(max-width: 1870px) 100vw, 1870px" /> </a>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-d80d832 e-con-full e-flex e-con e-child"
                        data-id="d80d832" data-element_type="container">
                        <div class="elementor-element elementor-element-6d11e3d elementor-widget elementor-widget-shortcode"
                            data-id="6d11e3d" data-element_type="widget" data-widget_type="shortcode.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-shortcode">
                                    <div class="mcbompe-search-wrapper" id="mcbompe-search-9658">
                                        <div class="mcbompe-search-trigger"><svg aria-hidden="true"
                                                class="e-font-icon-svg e-fas-search" viewBox="0 0 512 512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                                </path>
                                            </svg><span class="mcbompe-search-text"></span></div>
                                        <div class="e-search-overlay">
                                            <form method="get" action="https://takomi.vn"
                                                class="e-search-input-wrapper"><input id="search-mcbompe-search-9658"
                                                    placeholder="Tìm kiếm..." class="e-search-input no-icon-label"
                                                    type="search" name="s" value="" autocomplete="off" role="combobox"
                                                    aria-autocomplete="list" aria-expanded="false"
                                                    aria-controls="results-mcbompe-search-9658" aria-haspopup="listbox">
                                                <div class="e-font-icon-svg e-fas-times hidden"> </div>
                                                <button class="e-search-submit  " type="submit">

                                                    <span class="">
                                                        Tìm kiếm </span>
                                                </button><output id="results-mcbompe-search-9658"
                                                    class="e-search-results-container hide-loader" aria-live="polite"
                                                    aria-atomic="true" aria-label="Results for search" tabindex="0">
                                                    <div class="e-search-results"></div>
                                                    <div class="e-search-loader"><svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 28 28">
                                                            <path fill-rule="evenodd"
                                                                d="M14 .188c.587 0 1.063.475 1.063 1.062V5.5a1.063 1.063 0 0 1-2.126 0V1.25c0-.587.476-1.063 1.063-1.063ZM4.182 4.181a1.063 1.063 0 0 1 1.503 0L8.73 7.228A1.062 1.062 0 1 1 7.228 8.73L4.182 5.685a1.063 1.063 0 0 1 0-1.503Zm19.636 0a1.063 1.063 0 0 1 0 1.503L20.772 8.73a1.062 1.062 0 1 1-1.502-1.502l3.045-3.046a1.063 1.063 0 0 1 1.503 0ZM.188 14c0-.587.475-1.063 1.062-1.063H5.5a1.063 1.063 0 0 1 0 2.126H1.25A1.063 1.063 0 0 1 .187 14Zm21.25 0c0-.587.475-1.063 1.062-1.063h4.25a1.063 1.063 0 0 1 0 2.126H22.5A1.063 1.063 0 0 1 21.437 14ZM8.73 19.27a1.062 1.062 0 0 1 0 1.502l-3.045 3.046a1.063 1.063 0 0 1-1.503-1.503l3.046-3.046a1.063 1.063 0 0 1 1.502 0Zm10.54 0a1.063 1.063 0 0 1 1.502 0l3.046 3.045a1.063 1.063 0 0 1-1.503 1.503l-3.046-3.046a1.063 1.063 0 0 1 0-1.502ZM14 21.438c.587 0 1.063.475 1.063 1.062v4.25a1.063 1.063 0 0 1-2.126 0V22.5c0-.587.476-1.063 1.063-1.063Z">
                                                            </path>
                                                        </svg></div>
                                                </output>
                                            </form>
                                        </div>
                                    </div>
                                    <style>
                                        .mcbompe-search-wrapper {
                                            position: relative;
                                            display: inline-block;
                                        }

                                        .e-search-input {
                                            flex: none;
                                            max-width: 82%;
                                        }

                                        .e-search-results {
                                            margin-top: 10px;
                                            position: absolute;
                                            background: #fff;
                                            padding: 20px;
                                            top: 100%;
                                            left: 0;
                                            width: 100%;
                                        }

                                        .e-search-submit {
                                            color: #000000;
                                            border: 1px solid #000000;
                                        }

                                        .e-search-submit:hover {
                                            background: #000000;
                                        }

                                        .e-search-result a {
                                            color: #000000;
                                        }

                                        .e-search-results:empty {
                                            display: none;
                                        }

                                        .mcbompe-search-trigger {
                                            cursor: pointer;
                                            display: flex;
                                            align-items: center;
                                            gap: 8px;
                                        }

                                        .elementor-shortcode {
                                            display: flex;
                                        }

                                        .mcbompe-search-trigger svg {
                                            width: 20px;
                                            height: 20px;
                                            fill: #145FAD;
                                        }

                                        .e-search-overlay {
                                            z-index: 9999;
                                            position: fixed;
                                            width: 100%;
                                            height: 100%;
                                            padding-top: 100px;
                                            background: #00000099;
                                            top: 0;
                                            left: 0;
                                            display: none;
                                            align-items: flex-start;
                                            justify-content: center;
                                        }

                                        .e-search-overlay.active {
                                            display: flex;
                                        }

                                        .e-search-input-wrapper {
                                            position: relative;
                                            top: 0;
                                            right: 0;
                                            width: 50%;
                                            background: #fff;
                                            padding: 10px;
                                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                                            border-radius: 4px;
                                            margin-top: 5px;
                                            display: flex;
                                            gap: 10px;
                                        }

                                        .e-search-input-wrapper.active {
                                            display: block;
                                        }

                                        .e-search-input {
                                            width: 100%;
                                            padding: 8px;
                                            border: 1px solid #ddd;
                                            border-radius: 4px;
                                        }

                                        .e-font-icon-svg.e-fas-times {
                                            position: absolute;
                                            right: 10px;
                                            top: 50%;
                                            transform: translateY(-50%);
                                            width: 16px;
                                            height: 16px;
                                            cursor: pointer;
                                        }

                                        .e-font-icon-svg.e-fas-times.hidden {
                                            display: none;
                                        }

                                        .e-search-results-container {
                                            margin-top: 10px;
                                        }

                                        .e-search-loader {
                                            display: none;
                                            text-align: center;
                                            padding: 10px;
                                        }

                                        .e-search-loader svg {
                                            width: 24px;
                                            height: 24px;
                                            animation: spin 1s linear infinite;
                                        }

                                        @keyframes spin {
                                            0% {
                                                transform: rotate(0deg);
                                            }

                                            100% {
                                                transform: rotate(360deg);
                                            }
                                        }

                                        .hide-loader .e-search-loader {
                                            display: none;
                                        }

                                        @media (max-width: 768px) {
                                            .e-search-input-wrapper {
                                                width: 90%;
                                            }

                                            .e-search-input {
                                                flex: 1;
                                            }
                                        }
                                    </style>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const searchWrapper = document.querySelector("#mcbompe-search-9658 .mcbompe-search-trigger");
                                            const searchInput = document.querySelector("#mcbompe-search-9658 .e-search-overlay");
                                            const clearButton = document.querySelector("#mcbompe-search-9658 .e-fas-times");
                                            const input = document.querySelector("#search-mcbompe-search-9658");
                                            const resultsContainer = document.querySelector("#results-mcbompe-search-9658 .e-search-results");
                                            // Close search overlay when clicking outside search input wrapper
                                            searchInput.addEventListener("click", function (e) {
                                                if (!e.target.closest(".e-search-input-wrapper")) {
                                                    searchInput.classList.remove("active");
                                                }
                                            });
                                            if (searchWrapper && searchInput) {
                                                searchWrapper.addEventListener("click", function () {
                                                    searchInput.classList.toggle("active");
                                                    if (searchInput.classList.contains("active")) {
                                                        input.focus();
                                                    }
                                                });
                                            }

                                            // Close search when clicking outside
                                            document.addEventListener("click", function (e) {
                                                if (!searchInput.contains(e.target) && !searchWrapper.contains(e.target)) {
                                                    searchInput.classList.remove("active");
                                                }
                                            });

                                            // Handle input changes
                                            let searchTimeout;
                                            input.addEventListener("input", function () {
                                                clearButton.classList.toggle("hidden", !this.value);

                                                clearTimeout(searchTimeout);
                                                searchTimeout = setTimeout(() => {
                                                    if (this.value.length >= 3) {
                                                        performSearch(this.value);
                                                    } else {
                                                        resultsContainer.innerHTML = "";
                                                    }
                                                }, 500);
                                            });

                                            // Clear search
                                            clearButton.addEventListener("click", function () {
                                                input.value = "";
                                                resultsContainer.innerHTML = "";
                                                this.classList.add("hidden");
                                            });

                                            // Perform search
                                            function performSearch(query) {
                                                resultsContainer.innerHTML = "<div class=\"e-search-loader\">Searching...</div>";

                                                fetch(`${window.location.origin}/wp-json/wp/v2/search?search=${encodeURIComponent(query)}&per_page=5&type=post`)
                                                    .then(response => response.json())
                                                    .then(results => {
                                                        resultsContainer.innerHTML = results.length ?
                                                            results.map(result => `
                                <div class="e-search-result">
                                    <a href="${result.url}">${result.title}</a>
                                </div>
                            `).join("") :
                                                            "<div class=\"no-results\">No results found</div>";
                                                    })
                                                    .catch(error => {
                                                        resultsContainer.innerHTML = "<div class=\"error\">Error performing search</div>";
                                                    });
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>