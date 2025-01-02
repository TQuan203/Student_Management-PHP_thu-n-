<?php
session_start();
include "../../DB_connection.php"; // Đảm bảo rằng bạn đã bao gồm kết nối đến cơ sở dữ liệu ở đây

if (isset($_GET['masinhvien'])) {
    $s = $_GET['masinhvien'];

    // Thực hiện truy vấn xóa sinh viên từ cơ sở dữ liệu
    $sql = "DELETE FROM sinhvien WHERE 'sinhvien'.'`masinhvien` = '$s'";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$s]);

    // Kiểm tra lỗi sau khi thực hiện execute
    if (!$result) {
        // Nếu có lỗi, hiển thị thông báo và dừng chương trình
        $errorInfo = $stmt->errorInfo();
        var_dump($errorInfo); // Hiển thị thông tin lỗi
        exit;
    }

    // Chuyển hướng trở lại trang danh sách sinh viên hoặc trang nào đó khác
    header("Location: sinhvien.php?deleted=true");
    exit;
} else {
    // Nếu không có ID được cung cấp, chuyển hướng người dùng trở lại trang danh sách sinh viên hoặc trang nào đó khác
    header("Location: sinhvien.php");
    exit;
}
?>
