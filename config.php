<?php
$conn = mysqli_connect('localhost', 'root', '', 'shop_db');

// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}

//echo "Kết nối thành công";
?>
