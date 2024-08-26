<?php
@include '../config/config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../pages/login.php');
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
   <!-- liên kết font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- liên kết file css tùy chỉnh -->
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php @include '../components/header.php'; ?>

<section class="heading">
    <h3>đơn hàng của bạn</h3>
    <p> <a href="index.php">Trang chủ</a> / Đơn hàng </p>
</section>

<section class="placed-orders">
    <h1 class="title">Đơn hàng đã đặt</h1>
    <div class="box-container">
    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('Lỗi truy vấn');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> Ngày đặt hàng : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> Tên : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> Số điện thoại : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> Địa chỉ : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> Sản phẩm của bạn : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> Tổng giá: <span><?php echo number_format($fetch_orders['total_price'], 0, ',', '.'); ?> VNĐ</span></p>
        <p> Tình trạng thanh toán : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">Bạn chưa có đơn hàng nào!</p>';
    }
    
    ?>
    </div>

</section>

<?php @include '../components/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>
