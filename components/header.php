<?php
function getBaseUrl() {
    $current_path = $_SERVER['PHP_SELF'];
    // Kiểm tra xem đường dẫn có chứa '/pages/' không
    if (strpos($current_path, '/pages/') !== false) {
        return '../'; // Trở về thư mục cha của 'pages'
    }
    return ''; // Nếu không, trả về chuỗi rỗng
}

$current_page = basename($_SERVER['PHP_SELF']);
?>

<header class="header">
    <div class="flex">
        <a href="<?php echo getBaseUrl(); ?>index.php" id="home-link" class="logo">BookStore</a>
        <nav class="navbar">
            <ul>
                <li><a href="<?php echo getBaseUrl(); ?>index.php" id="home-nav">Trang chủ</a></li>
                <li><a href="#">Trang +</a>
                    <ul>
                        <li><a href="<?php echo getBaseUrl(); ?>pages/about.php">Giới thiệu</a></li>
                        <li><a href="<?php echo getBaseUrl(); ?>pages/contact.php">Liên hệ</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo getBaseUrl(); ?>pages/shop.php">Cửa hàng</a></li>
                <li><a href="<?php echo getBaseUrl(); ?>pages/orders.php">Đơn hàng</a></li>
                <li><a href="#">Tài khoản +</a>
                    <ul>
                        <li><a href="<?php echo getBaseUrl(); ?>pages/login.php">Đăng nhập</a></li>
                        <li><a href="<?php echo getBaseUrl(); ?>pages/register.php">Đăng ký</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="<?php echo getBaseUrl(); ?>pages/search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="<?php echo getBaseUrl(); ?>pages/wishlist.php"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="<?php echo getBaseUrl(); ?>pages/cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
        </div>
        <div class="account-box">
            <p>User : <span><?php echo htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); ?></span></p>
            <p>Email : <span><?php echo htmlspecialchars($_SESSION['user_email'], ENT_QUOTES, 'UTF-8'); ?></span></p>
            <a href="<?php echo getBaseUrl(); ?>pages/logout.php" class="delete-btn">Đăng xuất</a>
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var homeLink = document.getElementById('home-link');
        var homeNav = document.getElementById('home-nav');
        
        // Lấy đường dẫn của trang hiện tại
        var currentPath = window.location.pathname;
        var isInPages = currentPath.includes('/pages/');

        var basePath = isInPages ? '../' : '';
        
        homeLink.href = basePath + 'index.php';
        homeNav.href = basePath + 'index.php';
    });
</script>
