<?php
$conn = mysqli_connect('Localhost', 'root', '', 'books_tore');

// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}

$conn->set_charset("utf8mb4");
//echo "Kết nối thành công";
?>
