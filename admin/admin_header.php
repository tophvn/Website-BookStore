<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '
        <div class="message">
            <span>' . htmlspecialchars($msg) . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}

?>
<header class="header">
    <div class="flex">
        <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>
        <nav class="navbar">
            <a href="../admin/admin_page.php">Trang Chủ</a>
            <a href="admin_products.php">Sản Phẩm</a>
            <a href="admin_orders.php">Đơn Hàng</a>
            <a href="admin_users.php">Người Dùng</a>
            <a href="admin_contacts.php">Tin Nhắn</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="account-box">
            <p>User: <span><?php echo htmlspecialchars($_SESSION['admin_name']); ?></span></p>
            <p>Email: <span><?php echo htmlspecialchars($_SESSION['admin_email']); ?></span></p>
            <a href="../logout.php" class="delete-btn">Đăng Xuất</a>
            <div><a href="../login.php">Đăng Nhập</a> | <a href="../register.php">Đăng Ký</a></div>
        </div>
    </div>
</header>
