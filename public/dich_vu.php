<?php
// 1) Load config
$config = require __DIR__ . '/../config/config.php';

// 2) Load class
require_once __DIR__ . '/../core/Database.php';

// 3) Kết nối DB
$db = new Core\Database($config);
$conn = $db->connect();

// 4) Lấy danh mục Dịch vụ
$sql_categories = "SELECT * FROM service_categories ORDER BY id ASC";
$stmt_categories = $conn->query($sql_categories);
$news_categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

// 5) Lọc bài viết theo category (nếu có)
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : null;

if ($selectedCategory) {
    $sql_category_id = "SELECT id FROM service_categories WHERE slug = ?";
    $stmt_category_id = $conn->prepare($sql_category_id);
    $stmt_category_id->execute([$selectedCategory]);
    $categoryRow = $stmt_category_id->fetch(PDO::FETCH_ASSOC);

    if ($categoryRow) {
        $categoryId = $categoryRow['id'];
        $sql_posts = "SELECT * FROM services WHERE category_id = ? ORDER BY updated_at DESC";
        $stmt_posts = $conn->prepare($sql_posts);
        $stmt_posts->execute([$categoryId]);
    } else {
        // Slug không tồn tại => không bài nào
        $stmt_posts = $conn->prepare("SELECT * FROM services WHERE 1=0");
        $stmt_posts->execute();
    }
} else {
    // Không chọn danh mục => lấy tất cả
    $sql_posts = "SELECT * FROM services ORDER BY updated_at DESC";
    $stmt_posts = $conn->query($sql_posts);
}

$news_posts = $stmt_posts->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="../css/tin_tuc.css">

<!-- Banner -->
<div style="
  height: 300px;
  background-image: url('/img/bg_tin_tuc.webp');
  background-size: cover;
  background-position: center;
">
    <h1 class="text-center pt-5">Dịch vụ</h1>
    <h2 class="text-center pt-5">Trang chủ / Dịch vụ</h2>
</div>

<!-- Layout -->
<div class="elementor-element elementor-element-534d8546 e-flex e-con-boxed e-con e-parent mt-3">
    <div class="e-con-inner">
        <!-- Menu danh mục -->
        <div class="elementor-element elementor-element-35ca9b3d e-con-full e-flex e-con e-child m-2">
            <div class="elementor-element elementor-element-5fc0f465 elementor-widget elementor-widget-template">
                <div style="background-color: #00712D;" class="elementor-widget-container p-2">
                    <nav aria-label="Menu"
                        class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-vertical e--pointer-background e--animation-fade">
                        <ul id="menu-news-categories" class="elementor-nav-menu sm-vertical">
                            <style>
                                #menu-news-categories .menu-item:hover {
                                    background-color: #145FAD;
                                }

                                #menu-news-categories .menu-item.active {
                                    background-color: #145FAD;
                                }
                            </style>
                            <?php foreach ($news_categories as $category): ?>
                                <?php
                                $isActive = ($selectedCategory === $category['slug']) ? 'active' : '';
                                ?>
                                <li class="menu-item <?php echo $isActive; ?>">
                                    <a style="color:#fff;font-weight:500;"
                                        href="?category=<?php echo urlencode($category['slug']); ?>" class="elementor-item">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Danh sách bài viết -->
        <div class="elementor-element elementor-element-7225435c e-con-full e-flex e-con e-child">
            <div
                class="elementor-element elementor-element-d75ffcd elementor-posts--align-center elementor-grid-3 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top load-more-align-center elementor-widget elementor-widget-posts">
                <div class="elementor-widget-container">
                    <div
                        class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid elementor-has-item-ratio">

                        <?php if (count($news_posts) > 0): ?>
                            <?php foreach ($news_posts as $post): ?>
                                <article
                                    class="elementor-post elementor-grid-item post-<?php echo $post['id']; ?> post type-post status-publish format-standard has-post-thumbnail hentry">
                                    <a class="elementor-post__thumbnail__link"
                                        href="/dich-vu/<?php echo htmlspecialchars($post['id']); ?>" tabindex="-1">
                                        <div class="elementor-post__thumbnail">
                                            <img width="800" height="533"
                                                src="<?php echo htmlspecialchars($post['image']); ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="elementor-post__text">
                                        <h3 class="elementor-post__title">
                                            <a href="/dich-vu/<?php echo htmlspecialchars($post['id']); ?>">
                                                <?php echo htmlspecialchars($post['name']); ?>
                                            </a>
                                        </h3>
                                        <div class="elementor-post__excerpt">
                                            <p><?php echo htmlspecialchars($post['description']); ?></p>
                                        </div>
                                        <a class="elementor-post__read-more"
                                            href="/dich-vu/<?php echo htmlspecialchars($post['id']); ?>"
                                            aria-label="Read more about <?php echo htmlspecialchars($post['name']); ?>">
                                            Xem thêm »
                                        </a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có bài viết nào trong danh mục này.</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
