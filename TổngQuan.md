# School management system with PHP

## Overview - Tổng quan
Website quản lý sinh viên sử dụng PHP và MySQL.

## Database - Cơ sở dữ liệu

Database gồm các thực thể:
- Giảng viên
- Sinh viên
- Quản lý/ Nhân viên
- Môn/Khóa học
- Lớp học
- Bài giảng/ Bài tập/ Bài kiểm tra
- Điểm

## Application - Ứng dụng

Ứng dụng hỗ trợ 3 quyền truy cập với các chức năng chính khác nhau:
- Giảng viên
    - Xem danh sách lớp mình dạy
    - Thêm/Sửa/Xóa các bài giảng, bài tập, bài kiểm tra trong lớp
    - Xem danh sách sinh viên của lớp
    - Nhập/Chỉnh sửa điểm của sinh viên
- Sinh viên
    - Xem danh sách lớp học
    - Xem bài giảng, bài tập, bài kiểm tra trong lớp
    - Xem điểm của môn/khóa học
- Quản lý/ Nhân viên
    - Tạo tài khoản giảng viên, sinh viên
    - Tạo môn/khóa học
    - Tạo lớp học với giảng viên phụ trách
    - Thêm sinh viên vào lớp học 
    - Thêm,sửa,xóa sinh viên(trong giai đoạn sửa chữa/phát triển)
    - Tìm kiếm thông tin sinh viên(trong giai đoạn sửa chữa và phát triển)


Các chức năng chung:
- Đăng nhập
- Xem thông tin tài khoản
- Đổi mật khẩu(Sinh viên)

## Technologies - Công nghệ sử dụng

- PHP
- MySQL
- HTML
- CSS
- Bootstrap 5

## Manual - Hướng dẫn sử dụng

- Yêu cầu:
    - Cài đặt [PHP](https://www.php.net/manual/en/install.php), [MySQL](https://dev.mysql.com/downloads/installer/) (khuyến khích cài đặt bằng [XAMPP](https://www.apachefriends.org/download.html)).
    - Clone hoặc download file từ repository này.
    ```console
    ```
- Set up database cho ứng dụng
    - Khởi động MySQL.
    - Tạo database tên `learning_teaching` trong MySQL.
    - Copy nội dung trong file [learning_teaching.sql](learning_teaching.sql) dán vào querybox trong database `learning_teaching` đã tạo trước đó.
    - Mở terminal và navigate vào folder tên `learning_teaching`.
    ```console
    cd learning_teaching
    ```
    - Khởi động ứng dụng với port tùy ý (ở đây dùng port 3000).
    ```console
    php -S localhost:3000
    ```
    tk:admin
    mk:123
    ```
