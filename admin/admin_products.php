<?php
@include '../config.php'; 

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../login.php');
    exit();
}

if (isset($_POST['add_product'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = __DIR__ . '/../uploaded_img/' . $image;

    // Kiểm tra tên sản phẩm có tồn tại không
    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('Truy vấn thất bại');

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'Tên sản phẩm đã tồn tại!';
    } else {
        // Thêm sản phẩm mới
        $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, details, price, image) VALUES('$name', '$details', '$price', '$image')") or die('Truy vấn thất bại');

        if ($insert_product) {
            // Kiểm tra kích thước ảnh
            if ($image_size > 2000000) {
                $message[] = 'Kích thước ảnh quá lớn!';
            } else {
                // Di chuyển ảnh
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    $message[] = 'Thêm sản phẩm thành công!';
                } else {
                    $message[] = 'Không thể di chuyển tệp hình ảnh!';
                }
            }
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // Lấy hình ảnh cũ để xóa
    $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('Truy vấn thất bại');
    $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
    $old_image_path = __DIR__ . '/../uploaded_img/' . $fetch_delete_image['image'];
    // Xóa hình ảnh cũ nếu tồn tại
    if (file_exists($old_image_path)) {
        unlink($old_image_path);
    }
    // Xóa sản phẩm và các mục liên quan
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('Truy vấn thất bại');
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('Truy vấn thất bại');
    mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('Truy vấn thất bại');

    header('location:admin_products.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <!-- link cdn font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- link file css admin custom -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="add-products">
    <form action="" method="POST" enctype="multipart/form-data">
        <h3>Thêm sản phẩm mới</h3>
        <input type="text" class="box" required placeholder="Nhập tên sản phẩm" name="name">
        <input type="number" min="0" class="box" required placeholder="Nhập giá sản phẩm" name="price">
        <textarea name="details" class="box" required placeholder="Nhập chi tiết sản phẩm" cols="30" rows="10"></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
        <input type="submit" value="Thêm sản phẩm" name="add_product" class="btn">
    </form>
</section>

<section class="show-products">
    <div class="box-container">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('Truy vấn thất bại');
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
        <div class="box">
            <div class="price"><?php echo number_format($fetch_products['price'], 0, ',', '.'); ?> VNĐ</div>
            <img class="image" src="../uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="details"><?php echo $fetch_products['details']; ?></div>
            <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">Cập nhật</a>
            <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Xác nhận xóa sản phẩm này?');">Xóa</a>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">Chưa có sản phẩm nào được thêm!</p>';
        }
        ?>
    </div>
</section>

<script src="../js/admin_script.js"></script>

</body>
</html>
