<?php
@include '../config/config.php'; 

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../pages/login.php');
    exit();
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('Xóa người dùng thất bại');
    header('location:admin_users.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Người Dùng</title>
    <!-- Liên kết CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="users">
    <h1 class="title">Tài khoản người dùng</h1>
    <div class="box-container">
        <?php
        $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('Truy vấn thất bại');
        if (mysqli_num_rows($select_users) > 0) {
            while ($fetch_users = mysqli_fetch_assoc($select_users)) {
        ?>
        <div class="box">
            <p>ID người dùng: <span><?php echo $fetch_users['id']; ?></span></p>
            <p>Tên người dùng: <span><?php echo $fetch_users['name']; ?></span></p>
            <p>Email: <span><?php echo $fetch_users['email']; ?></span></p>
            <p>Loại người dùng: <span style="color:<?php if ($fetch_users['user_type'] == 'admin') { echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span></p>
            <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');" class="delete-btn">Xóa</a>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">Không có người dùng nào!</p>';
        }
        ?>
    </div>
</section>

<script src="../js/admin_script.js"></script>

</body>
</html>

