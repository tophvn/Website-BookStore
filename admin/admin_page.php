<<<<<<< HEAD
<?php
@include '../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:../pages/login.php');
};
?>
<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bảng Điều Khiển</title>
   <!-- Liên kết CDN Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- Liên kết tệp CSS quản trị viên tùy chỉnh -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>
<section class="dashboard">
   <h1 class="title">Bảng Điều Khiển</h1>
   <div class="box-container">
      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'pending'") or die('Truy vấn thất bại');
            while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
               $total_pendings += $fetch_pendings['total_price'];
            };
         ?>
         <h3><?php echo number_format($total_pendings, 0, ',', '.'); ?> VNĐ</h3>

         <p>Tổng thanh toán đang chờ</p>
      </div>
      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'completed'") or die('Truy vấn thất bại');
            while($fetch_completes = mysqli_fetch_assoc($select_completes)){
               $total_completes += $fetch_completes['total_price'];
            };
         ?>
         <h3><?php echo number_format($total_completes, 0, ',', '.'); ?> VNĐ</h3>
         <p>Thanh toán hoàn thành</p>
      </div>

      <div class="box">
         <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Truy vấn thất bại');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Đơn hàng đã đặt</p>
      </div>
      <div class="box">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('Truy vấn thất bại');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>Sản phẩm đã thêm</p>
      </div>
      <div class="box">
         <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('Truy vấn thất bại');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>Người dùng</p>
      </div>
      <div class="box">
         <?php
            $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('Truy vấn thất bại');
            $number_of_admin = mysqli_num_rows($select_admin);
         ?>
         <h3><?php echo $number_of_admin; ?></h3>
         <p>Người dùng quản trị</p>
      </div>
      <div class="box">
         <?php
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('Truy vấn thất bại');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Tổng tài khoản</p>
      </div>
      <div class="box">
         <?php
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('Truy vấn thất bại');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>Tin nhắn mới</p>
      </div>
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

if(!isset($admin_id)){
   header('location:../pages/login.php');
};
?>
<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bảng Điều Khiển</title>
   <!-- Liên kết CDN Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- Liên kết tệp CSS quản trị viên tùy chỉnh -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>
<section class="dashboard">
   <h1 class="title">Bảng Điều Khiển</h1>
   <div class="box-container">
      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'pending'") or die('Truy vấn thất bại');
            while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
               $total_pendings += $fetch_pendings['total_price'];
            };
         ?>
         <h3><?php echo number_format($total_pendings, 0, ',', '.'); ?> VNĐ</h3>

         <p>Tổng thanh toán đang chờ</p>
      </div>
      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'completed'") or die('Truy vấn thất bại');
            while($fetch_completes = mysqli_fetch_assoc($select_completes)){
               $total_completes += $fetch_completes['total_price'];
            };
         ?>
         <h3><?php echo number_format($total_completes, 0, ',', '.'); ?> VNĐ</h3>
         <p>Thanh toán hoàn thành</p>
      </div>

      <div class="box">
         <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Truy vấn thất bại');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Đơn hàng đã đặt</p>
      </div>
      <div class="box">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('Truy vấn thất bại');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>Sản phẩm đã thêm</p>
      </div>
      <div class="box">
         <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('Truy vấn thất bại');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>Người dùng</p>
      </div>
      <div class="box">
         <?php
            $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('Truy vấn thất bại');
            $number_of_admin = mysqli_num_rows($select_admin);
         ?>
         <h3><?php echo $number_of_admin; ?></h3>
         <p>Người dùng quản trị</p>
      </div>
      <div class="box">
         <?php
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('Truy vấn thất bại');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Tổng tài khoản</p>
      </div>
      <div class="box">
         <?php
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('Truy vấn thất bại');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>Tin nhắn mới</p>
      </div>
   </div>
</section>
<script src="../js/admin_script.js"></script>
</body>
</html>
>>>>>>> 5cab3bc505402bd8805d4d10549307752c7d6627
