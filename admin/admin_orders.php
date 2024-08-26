<<<<<<< HEAD
<?php
@include '../config/config.php'; 

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../pages/login.php');
    exit();
}

if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('Cập nhật trạng thái thanh toán thất bại');
    $message[] = 'Trạng thái thanh toán đã được cập nhật!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('Xóa đơn hàng thất bại');
    header('location:admin_orders.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <!-- Liên kết CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Liên kết tệp CSS quản trị viên tùy chỉnh -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="placed-orders">
    <h1 class="title">Đơn Hàng Đã Đặt</h1>
    <div class="box-container">
        <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Truy vấn thất bại');
        if (mysqli_num_rows($select_orders) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
        ?>
        <div class="box">
            <p>ID người dùng: <span><?php echo $fetch_orders['user_id']; ?></span></p>
            <p>Đặt vào ngày: <span><?php echo $fetch_orders['placed_on']; ?></span></p>
            <p>Tên: <span><?php echo $fetch_orders['name']; ?></span></p>
            <p>Số điện thoại: <span><?php echo $fetch_orders['number']; ?></span></p>
            <p>Email: <span><?php echo $fetch_orders['email']; ?></span></p>
            <p>Địa chỉ: <span><?php echo $fetch_orders['address']; ?></span></p>
            <p>Tổng sản phẩm: <span><?php echo $fetch_orders['total_products']; ?></span></p>
            <p>Tổng giá: <span><?php echo number_format($fetch_orders['total_price'], 0, ',', '.'); ?> VNĐ</span></p>
            <p>Phương thức thanh toán: <span><?php echo $fetch_orders['method']; ?></span></p>
            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="update_payment">
                    <option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
                    <option value="pending">Đang chờ</option>
                    <option value="completed">Hoàn thành</option>
                </select>
                <input type="submit" name="update_order" value="Cập Nhật" class="option-btn">
                <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Xóa</a>
            </form>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">Chưa có đơn hàng nào được đặt!</p>';
        }
        ?>
    </div>
</section>

<script src="../js/admin_script.js"></script>

</body>
</html>
=======
<?php
@include '../config/config.php'; 

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../pages/login.php');
    exit();
}

if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('Cập nhật trạng thái thanh toán thất bại');
    $message[] = 'Trạng thái thanh toán đã được cập nhật!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('Xóa đơn hàng thất bại');
    header('location:admin_orders.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <!-- Liên kết CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Liên kết tệp CSS quản trị viên tùy chỉnh -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="placed-orders">
    <h1 class="title">Đơn Hàng Đã Đặt</h1>
    <div class="box-container">
        <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Truy vấn thất bại');
        if (mysqli_num_rows($select_orders) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
        ?>
        <div class="box">
            <p>ID người dùng: <span><?php echo $fetch_orders['user_id']; ?></span></p>
            <p>Đặt vào ngày: <span><?php echo $fetch_orders['placed_on']; ?></span></p>
            <p>Tên: <span><?php echo $fetch_orders['name']; ?></span></p>
            <p>Số điện thoại: <span><?php echo $fetch_orders['number']; ?></span></p>
            <p>Email: <span><?php echo $fetch_orders['email']; ?></span></p>
            <p>Địa chỉ: <span><?php echo $fetch_orders['address']; ?></span></p>
            <p>Tổng sản phẩm: <span><?php echo $fetch_orders['total_products']; ?></span></p>
            <p>Tổng giá: <span><?php echo number_format($fetch_orders['total_price'], 0, ',', '.'); ?> VNĐ</span></p>
            <p>Phương thức thanh toán: <span><?php echo $fetch_orders['method']; ?></span></p>
            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="update_payment">
                    <option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
                    <option value="pending">Đang chờ</option>
                    <option value="completed">Hoàn thành</option>
                </select>
                <input type="submit" name="update_order" value="Cập Nhật" class="option-btn">
                <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Xóa</a>
            </form>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">Chưa có đơn hàng nào được đặt!</p>';
        }
        ?>
    </div>
</section>

<script src="../js/admin_script.js"></script>

</body>
</html>
>>>>>>> 5cab3bc505402bd8805d4d10549307752c7d6627
