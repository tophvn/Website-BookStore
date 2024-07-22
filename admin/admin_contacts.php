<?php
@include '../config.php'; // Cập nhật đường dẫn đến tệp config.php nếu cần

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../login.php');
    exit();
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('Lỗi truy vấn');
    header('location:admin_contacts.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Nhắn</title>
    <!-- Liên kết CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Liên kết tệp CSS quản trị viên tùy chỉnh -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="messages">
    <h1 class="title">Tin Nhắn</h1>
    <div class="box-container">
        <?php
        $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('Lỗi truy vấn');
        if (mysqli_num_rows($select_message) > 0) {
            while ($fetch_message = mysqli_fetch_assoc($select_message)) {
        ?>
        <div class="box">
            <p>ID người dùng: <span><?php echo $fetch_message['user_id']; ?></span></p>
            <p>Tên: <span><?php echo $fetch_message['name']; ?></span></p>
            <p>Số điện thoại: <span><?php echo $fetch_message['number']; ?></span></p>
            <p>Email: <span><?php echo $fetch_message['email']; ?></span></p>
            <p>Tin nhắn: <span><?php echo $fetch_message['message']; ?></span></p>
            <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tin nhắn này?');" class="delete-btn">Xóa</a>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">Không có tin nhắn nào!</p>';
        }
        ?>
    </div>
</section>

<script src="../js/admin_script.js"></script>
</body>
</html>
