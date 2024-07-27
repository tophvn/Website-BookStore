<?php
// Cấu hình kết nối cơ sở dữ liệu
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shop_db';

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
}

// Thiết lập bộ ký tự
$conn->set_charset("utf8mb4");

// $base_url = 'index.php';
//echo "Kết nối thành công";
?>
