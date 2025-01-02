<?php
// Kiểm tra xem đã có từ khóa tìm kiếm được gửi lên không
if (isset($_GET['keyword'])) {
    // Lấy từ khóa tìm kiếm từ URL và làm sạch nó
    $keyword = trim($_GET['keyword']);
    // Kiểm tra xem từ khóa có rỗng không
    if (!empty($keyword)) {
        // Kết nối đến cơ sở dữ liệu
        include "../DB_connection.php";

        // Chuẩn bị câu truy vấn
        $sql = "SELECT * FROM sinhvien WHERE masinhvien LIKE :keyword OR ho_tenlot LIKE :keyword OR ten LIKE :keyword";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
        $stmt->execute();

        // Lấy kết quả tìm kiếm
        $sinhvien = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Kiểm tra xem có sinh viên được tìm thấy không
        if ($sinhvien) {
            // Hiển thị kết quả tìm kiếm
            foreach ($sinhvien as $sv) {
                // Hiển thị thông tin sinh viên tìm thấy
                echo htmlspecialchars($sv['masinhvien']) . " - " . htmlspecialchars($sv['ho_tenlot']) . " " . htmlspecialchars($sv['ten']) . "<br>";
            }
        } else {
            echo "Không tìm thấy sinh viên nào phù hợp với từ khóa tìm kiếm.";
        }
    } else {
        echo "Vui lòng nhập từ khóa tìm kiếm.";
    }
}
?>
