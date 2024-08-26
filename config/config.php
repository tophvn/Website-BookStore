<<<<<<< HEAD
<?php
$conn = mysqli_connect('localhost', 'root', '', 'shop_db');

// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}

$conn->set_charset("utf8mb4");
//echo "Kết nối thành công";
?>
=======
<?php
$conn = mysqli_connect('sql110.infinityfree.com', 'if0_36950872', '7BCkbaU02cm05I', 'if0_36950872_shop');

// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}

$conn->set_charset("utf8mb4");
//echo "Kết nối thành công";
?>
>>>>>>> 5cab3bc505402bd8805d4d10549307752c7d6627
