<<<<<<< HEAD
<?php
// Kiểm tra page footer
function getBaseUrl() {
    $current_path = $_SERVER['PHP_SELF'];
    if (strpos($current_path, '/pages/') !== false) {
        return '../';
    }
    return '';
}
?>
=======
<?php
// Kiểm tra page footer
function getBaseUrl() {
    $current_path = $_SERVER['PHP_SELF'];
    if (strpos($current_path, '/pages/') !== false) {
        return '../';
    }
    return '';
}
?>
>>>>>>> 5cab3bc505402bd8805d4d10549307752c7d6627
