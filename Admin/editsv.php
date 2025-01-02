<?php
session_start();
if (isset($_SESSION['maadmin']) && isset($_SESSION['tucach'])) {
    if ($_SESSION['tucach'] == 'Admin') {
        include "../controllers/admin_ctl.php";
        $maadmin = $_SESSION['maadmin'];
        $admin = getInfoAD($maadmin, $conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../imgs/icon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "comp/navbar.php"; ?>
    <div class="container mt-5">
        <h1>Sửa thông tin sinh viên</h1>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" method="post" action="comp/suasv.php">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="masv" placeholder="" value="<?php
                                                                                                if (isset($_SESSION['masv'])) {
                                                                                                    echo $_SESSION['masv'];
                                                                                                }
                                                                                                ?>">
                    <label class="form-label">Mã sinh viên <span style="color: red;">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ho" placeholder="" value="<?php
                                                                                                if (isset($_SESSION['ho'])) {
                                                                                                    echo $_SESSION['ho'];
                                                                                                }
                                                                                                ?>">
                    <label class="form-label">Họ và tên lót <span style="color: red;">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ten" placeholder="" value="<?php
                                                                                                    if (isset($_SESSION['ten'])) {
                                                                                                        echo $_SESSION['ten'];
                                                                                                    }
                                                                                                    ?>">
                    <label class="form-label">Tên <span style="color: red;">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="tdn" placeholder="" value="<?php
                                                                                                if (isset($_SESSION['tdn'])) {
                                                                                                    echo $_SESSION['tdn'];
                                                                                                }
                                                                                                ?>">
                    <label class="form-label">Tên đăng nhập <span style="color: red;">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="sdt" placeholder="" value="<?php
                                                                                                if (isset($_SESSION['sdt'])) {
                                                                                                    echo $_SESSION['sdt'];
                                                                                                }
                                                                                                ?>">
                    <label class="form-label">Số điện thoại <span style="color: red;">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="" value="<?php
                                                                                                if (isset($_SESSION['email'])) {
                                                                                                    echo $_SESSION['email'];
                                                                                                }
                                                                                                ?>">
                    <label class="form-label">Email <span style="color: red;">*</span></label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
