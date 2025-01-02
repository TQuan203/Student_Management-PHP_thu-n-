<?php
session_start();
if (
  isset($_SESSION['magiangvien']) && isset($_SESSION['tucach'])
) {

  if ($_SESSION['tucach'] == 'GiangVien') {
    include "../controllers/includer.php";

    $magiangvien = $_SESSION['magiangvien'];

    $giangvien = getInfoGV($magiangvien, $conn);
    $gioitinh = "Nam";
    if ($giangvien['gioitinh'] == 0) {
      $gioitinh = "Nữ";
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
        <?php
        $tengiangvien = $giangvien['ho_tenlot'] . " " . $giangvien['ten'];
        $title = "Giảng viên " . $tengiangvien;
        $usrname = $title;
        include "../header.php";
        ?>
      </title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../imgs/icon.ico">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      <?php
      include "comp/navbar.php";
      ?>
      <?php
      $student = 1;
      if ($student != 0) {
      ?>
        <div class="container mt-5">
          <h1>Trang cá nhân giảng viên</h1>
          <div class="row">
            <div class="col-4 card" style="width: 18rem;">
              <!-- <img src="../img/student-<?= $student['gender'] ?>.png" class="card-img-top" alt="..."> -->
              <img src="../imgs/logo2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-center">@<?= $giangvien['tendangnhap'] ?></h5>
              </div>
            </div>
            <div class="col-8">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Họ và tên: <?= $tengiangvien ?></li>
                <li class="list-group-item">Mã giảng viên: <?= $giangvien['magiangvien'] ?></li>
                <li class="list-group-item">Năm sinh: <?= $giangvien['namsinh'] ?></li>
                <li class="list-group-item">Giới tính: <?= $gioitinh ?></li>
                <li class="list-group-item">Số điện thoại: <?= $giangvien['sdt'] ?></li>
                <li class="list-group-item">Email: <?= $giangvien['email'] ?></li>
              </ul>
            </div>

          </div>
        </div>
      <?php
      } else {
        header("Location: student.php");
        exit;
      }
      ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        //$(document).ready(function(){
        //     $("#navLinks li:nth-child(1) a").addClass('active');
        //});
      </script>
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