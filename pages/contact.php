<<<<<<< HEAD
<?php

@include '../config/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../pages/login.php');
};

if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'Tin nhắn đã được gửi!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'Tin nhắn gửi thành công!';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liên hệ</title>
   <!-- liên kết font awesome cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- liên kết tệp css quản trị tùy chỉnh  -->
   <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<?php @include '../components/header.php'; ?>
<section class="heading">
    <h3>Liên hệ với chúng tôi</h3>
    <p> <a href="index.php">Trang chủ</a> / Liên hệ </p>
</section>
<section class="contact">
    <form action="" method="POST">
        <h3>Gửi tin nhắn cho chúng tôi!</h3>
        <input type="text" name="name" placeholder="Nhập tên của bạn" class="box" required> 
        <input type="email" name="email" placeholder="Nhập email của bạn" class="box" required>
        <input type="number" name="number" placeholder="Nhập số điện thoại của bạn" class="box" required>
        <textarea name="message" class="box" placeholder="Nhập tin nhắn của bạn" required cols="30" rows="10"></textarea>
        <input type="submit" value="Gửi tin nhắn" name="send" class="btn">
    </form>
</section>

<?php @include '../components/footer.php'; ?>
<script src="../js/script.js"></script>
</body>
</html>

=======
<?php
@include '../config/config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../pages/login.php');
};

if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'Tin nhắn đã được gửi!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'Tin nhắn gửi thành công!';
    }

}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liên hệ</title>
   <!-- liên kết font awesome cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- liên kết tệp css quản trị tùy chỉnh  -->
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php @include '../components/header.php'; ?>

<section class="heading">
    <h3>Liên hệ với chúng tôi</h3>
    <p> <a href="index.php">Trang chủ</a> / Liên hệ </p>
</section>
<section class="contact">
    <form action="" method="POST">
        <h3>Gửi tin nhắn cho chúng tôi!</h3>
        <input type="text" name="name" placeholder="Nhập tên của bạn" class="box" required> 
        <input type="email" name="email" placeholder="Nhập email của bạn" class="box" required>
        <input type="number" name="number" placeholder="Nhập số điện thoại của bạn" class="box" required>
        <textarea name="message" class="box" placeholder="Nhập tin nhắn của bạn" required cols="30" rows="10"></textarea>
        <input type="submit" value="Gửi tin nhắn" name="send" class="btn">
    </form>

</section>

<?php @include '../components/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>
>>>>>>> 5cab3bc505402bd8805d4d10549307752c7d6627
