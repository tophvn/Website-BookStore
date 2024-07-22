<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

$message = [];

if (isset($_POST['add_to_wishlist'])) {

    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_image = mysqli_real_escape_string($conn, $_POST['product_image']);
    
    $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Lỗi truy vấn');
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Lỗi truy vấn');

    if (mysqli_num_rows($check_wishlist_numbers) > 0) {
        $message[] = 'Sản phẩm đã được thêm vào danh sách yêu thích.';
    } elseif (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Sản phẩm đã được thêm vào giỏ hàng.';
    } else {
        mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('Lỗi truy vấn');
        $message[] = 'Sản phẩm đã được thêm vào danh sách yêu thích.';
    }
}

if (isset($_POST['add_to_cart'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_image = mysqli_real_escape_string($conn, $_POST['product_image']);
    $product_quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Lỗi truy vấn');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Sản phẩm đã được thêm vào giỏ hàng.';
    } else {
        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Lỗi truy vấn');

        if (mysqli_num_rows($check_wishlist_numbers) > 0) {
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Lỗi truy vấn');
        }

        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('Lỗi truy vấn');
        $message[] = 'Sản phẩm đã được thêm vào giỏ hàng.';
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang Chủ</title>
   <!-- liên kết font awesome cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- liên kết file css tùy chỉnh  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php @include 'header.php'; ?>
<section class="home">
   <div class="content">
      <h3>Sách là tri thức của nhân loại</h3>
      <a href="about.php" class="btn">Xem Thêm</a>
   </div>
</section>
<section class="products">
   <h1 class="title">Sản phẩm mới nhất</h1>
   <div class="box-container">
      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('Lỗi truy vấn');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
      <form action="" method="POST" class="box">
         <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <div class="price"><?php echo number_format($fetch_products['price'], 0, ',', '.'); ?> VNĐ</div>
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <input type="number" name="product_quantity" value="1" min="1" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="Yêu thích" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btn">
      </form>
      <?php
         }
      } else {
         echo '<p class="empty">Chưa có sản phẩm nào được thêm!</p>';
      }
      ?>
   </div>
   
   <br>
   <br>  
   <div class="slideshow-container">
      <div class="mySlides fade">
         <img src="images/slide1.png" style="width:100%">
         <div class="text">Kết giới sư</div>
      </div>
      <div class="mySlides fade">
         <img src="images/slide2.png" style="width:100%">
         <div class="text">Doraemon</div>
      </div>
      <div class="mySlides fade">
         <img src="images/slide3.png" style="width:100%">
         <div class="text">Yona</div>
      </div>
   </div>
   <br>
   <div style="text-align:center">

   <div class="more-btn">
      <a href="shop.php" class="option-btn">Xem Thêm</a>
   </div>
</section>
<section class="home-contact">
   <div class="content">
      <h3>Bạn có câu hỏi nào không?</h3>
      <p>Chúng tôi cảm ơn bạn vì đã quan tâm đến các sản phẩm. Bạn có thể gửi ý kiến của mình cho chúng tôi nếu cần hỗ trợ hay có ===</p>
      <a href="contact.php" class="btn">Liên hệ với chúng tôi</a>
   </div>
</section>

<?php @include 'footer.php'; ?>
<script src="js/script.js"></script>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
   <span class="dot" onclick="currentSlide(3)"></span> 
</div>

</body>
</html>
