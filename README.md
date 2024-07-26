# Trang web bán sách PHP & MySQL

Đây là một dự án trang web bán sách được xây dựng bằng PHP & MySQL.

## Cấu trúc thư mục

- **admin**: Chứa các tệp PHP liên quan đến phần quản trị trang web.
- **css**: Chứa các tệp CSS để định dạng giao diện trang web.
- **images**: Chứa các hình ảnh được sử dụng trong trang web.
- **js**: Chứa các tệp JavaScript để thêm tính năng tương tác.
- **uploaded_img**: Chứa các hình ảnh sản phẩm được tải lên.

## Các tệp PHP

- **about.php**: Trang giới thiệu.
- **cart.php**: Trang giỏ hàng.
- **checkout.php**: Trang thanh toán.
- **index.php**: Trang chính.
- **login.php**: Trang đăng nhập.
- **orders.php**: Trang đơn hàng.
- **register.php**: Trang đăng ký.
- **search_page.php**: Trang tìm kiếm.
- **shop.php**: Trang cửa hàng.
- **view_page.php**: Trang xem chi tiết sản phẩm.
- **wishlist.php**: Trang danh sách yêu thích.

## Hướng dẫn cài đặt

1. **Cài đặt môi trường**: Đảm bảo bạn đã cài đặt PHP và MySQL.
2. **Cấu hình database**: Cập nhật thông tin kết nối database trong tệp cấu hình.
3. **Cài đặt các phụ thuộc**: Nếu có bất kỳ thư viện nào cần cài đặt, hãy thực hiện theo hướng dẫn cài đặt.
4. **Khởi chạy dự án**: Đưa dự án lên máy chủ web của bạn và truy cập các trang web từ trình duyệt.

## Cách sử dụng

- **git clone**: 
  ```bash
  git clone https://github.com/tophvn/Website-BookStore.git
- Truy cập **index.php** để xem trang chính của trang web.
- Đăng nhập hoặc đăng ký tài khoản qua **login.php** và **register.php**.
- Duyệt sản phẩm qua **shop.php** và xem chi tiết sản phẩm qua **view_page.php**.
- Thêm sản phẩm vào giỏ hàng và thanh toán qua **cart.php** và **checkout.php**.
- Quản lý đơn hàng và danh sách yêu thích qua **orders.php** và **wishlist.php**.

## Ghi chú

- Đảm bảo cấu hình kết nối database đúng và các tệp cấu hình bảo mật.
- <code>$conn = mysqli_connect('localhost', 'root', '', 'shop_db');</code>
- Nếu gặp sự cố, hãy kiểm tra log lỗi PHP và MySQL để xử lý.

## Tài khoản demo
User: 123@gmail.com
Pass: 123


