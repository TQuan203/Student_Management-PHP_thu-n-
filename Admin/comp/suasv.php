<?php
session_start();

// Include file chứa các hàm cần thiết
include "../../DB_connection.php";

// Hàm kiểm tra sự tồn tại của sinh viên dựa trên mã sinh viên
function checkSV($id_sv, $conn)
{
    $sql = "SELECT * FROM in4sinhvien
            WHERE tendangnhap=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_sv);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

// Hàm lấy thông tin của sinh viên từ cơ sở dữ liệu
function getStudentInfo($id_sv, $conn)
{
    $sql = "SELECT * FROM sinhvien WHERE in4sinhvien = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_sv);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Hàm cập nhật thông tin sinh viên trong cơ sở dữ liệu
function updateStudentInfo($id_sv, $ho, $ten, $tdn, $sdt, $ns, $gt, $mk, $conn)
{
    $sql = "UPDATE sinhvien 
            SET ho_tenlot = :ho, ten = :ten, tendangnhap = :tdn, sdt = :sdt, namsinh = :ns, gioitinh = :gt, matkhau = :mk 
            WHERE in4sinhvien = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ho', $ho);
    $stmt->bindParam(':ten', $ten);
    $stmt->bindParam(':tdn', $tdn);
    $stmt->bindParam(':sdt', $sdt);
    $stmt->bindParam(':ns', $ns);
    $stmt->bindParam(':gt', $gt);
    $stmt->bindParam(':mk', $mk);
    $stmt->bindParam(':id', $id_sv);
    $stmt->execute();
}

// Kiểm tra xem người dùng đã đăng nhập và có quyền truy cập không
if (isset($_SESSION['maadmin']) && isset($_SESSION['tucach']) && $_SESSION['tucach'] == 'Admin') {
    if (
        isset($_POST['masv']) &&
        isset($_POST['ho']) &&
        isset($_POST['ten']) &&
        isset($_POST['tdn']) &&
        isset($_POST['sdt']) &&
        isset($_POST['ns']) &&
        isset($_POST['gt']) &&
        isset($_POST['mk']) &&
        isset($_POST['mk1'])
    ) {
        $masv = $_POST['masv'];
        $ho = $_POST['ho'];
        $ten = $_POST['ten'];
        $tdn = $_POST['tdn'];
        $sdt = $_POST['sdt'];
        $ns = $_POST['ns'];
        $gt = $_POST['gt'];
        $mk = $_POST['mk'];
        $mk1 = $_POST['mk1'];

        // Kiểm tra mã sinh viên có tồn tại không
        if (!checkSV($masv, $conn)) {
            $_SESSION['error'] = "Sinh viên không tồn tại";
            header("Location: ../editsv.php");
            exit;
        }

        // Kiểm tra mật khẩu
        if ($mk != $mk1) {
            $_SESSION['error'] = "Vui lòng xác nhận lại mật khẩu";
            header("Location: ../editsv.php");
            exit;
        }

        // Cập nhật thông tin sinh viên
        try {
            updateStudentInfo($masv, $ho, $ten, $tdn, $sdt, $ns, $gt, $mk, $conn);
            $_SESSION['success'] = "Cập nhật thông tin thành công";
            header("Location: ../sinhvien.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['error'] = "Đã có lỗi xảy ra";
            header("Location: ../editsv.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin";
        header("Location: ../editsv.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Bạn không có quyền truy cập";
    header("Location: ../login.php");
    exit;
}
?>
