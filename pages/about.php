<?php
@include '../config/config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
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
    <title>Về Chúng Tôi</title>
    <!-- liên kết CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- liên kết tệp CSS tùy chỉnh -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php @include '../components/header.php'; ?>

<section class="heading">
    <h3>Về Chúng Tôi</h3>
    <p> <a href="../index.php">Trang Chủ</a> / Về Chúng Tôi </p>
</section>

<section class="about">
    <div class="flex">
        <div class="image">
            <img src="../images/about-image1.jpg" alt="">
        </div>
        <div class="content">
            <h3>Tại Sao Chọn Chúng Tôi?</h3>
            <p>Mục tiêu của chúng tôi là cung cấp nội dung có giá trị, hấp dẫn và truyền cảm hứng cho mọi lứa tuổi, vượt xa sách giáo khoa thông thường. Với quan điểm này, chúng tôi coi mỗi cuốn sách là một tác phẩm nghệ thuật.</p>
            <a href="shop.php" class="btn">Mua Ngay</a>
        </div>
    </div>
    <div class="flex">
        <div class="content">
            <h3>Chúng Tôi Cung Cấp Gì?</h3>
            <p>Danh mục sách rộng lớn mà chúng tôi cung cấp bao gồm truyện tranh, giáo trình, sách giáo khoa, sách tham khảo,... và nhiều hơn nữa.</p>
            <a href="contact.php" class="btn">Liên Hệ</a>
        </div>
        <div class="image">
            <img src="../images/about-image2.jpg" alt="">
        </div>
    </div>
    <div class="flex">
        <div class="image">
            <img src="../images/about-image3.jpg" alt="">
        </div>
        <div class="content">
            <h3>Chúng Tôi Là Ai?</h3>
            <p>Chúng tôi là một hệ thống cửa hàng cung cấp sách online trên toàn quốc.</p>
            <a href="#reviews" class="btn">Đánh Giá Khách Hàng</a>
        </div>
    </div>
</section>

<section class="reviews" id="reviews">
    <h1 class="title">Đánh Giá Khách Hàng</h1>
    <div class="box-container">
        <div class="box">
            <img src="../images/profile.png" alt="">
            <p>Sách rất hay.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>NGƯỜI DÙNG 1</h3>
        </div>
        <div class="box">
            <img src="../images/profile.png" alt="">
            <p>Một câu chuyện đạo đức tốt cho giới trẻ</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>NGƯỜI DÙNG 2</h3>
        </div>
        <div class="box">
            <img src="../images/profile.png" alt="">
            <p>Tuyệt vời ...</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>NGƯỜI DÙNG 3</h3>
        </div>
        <div class="box">
            <img src="../images/profile.png" alt="">
            <p>Rất hay và bổ x</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>NGƯỜI DÙNG 4</h3>
        </div>
        <div class="box">
            <img src="../images/profile.png" alt="">
            <p>Giao hàng nhanh</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>NGƯỜI DÙNG 5</h3>
        </div>
        <div class="box">
            <img src="../images/profile.png" alt="">
            <p>Rất tốt</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>NGƯỜI DÙNG 6</h3>
        </div>
    </div>
</section>

<?php @include '../components/footer.php'; ?>

<script src="../js/script.js"></script>
</body>
</html>
