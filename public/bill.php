<?php
session_start();
$username = $_SESSION['username'];

include "book_ver2.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang đơn hàng</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/showBook.js"></script>
  <script type="text/javascript" src="js/showDetail.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">

</head>

<body>

  <div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-primary row">

      <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4">
        <a href="index.php">
          <h2 class="text-white">ZWBOOK</h2>
        </a>
      </div>

      <div class="col-lg-4 col-md-5">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
      <!----space--->
      <div class="col-lg-2 col-md-0 col-sm-0"></div>

      <?php
      if (isset($_SESSION['username'])) {
        echo "
      <ul class='navbar-nav ml-auto'>
        <li class='nav-item'>
          <a class='nav-link text-white' href='userPage.php'>Giỏ hàng</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link text-white' href='#'>Thông báo</a>
        </li>
        <li class='nav-item '>
          <a class='nav-link text-white ' data-toggle='dropdown' href='#'>Chào {$_SESSION['username']} </a>
          ​<ul class='dropdown-menu dropdown-menu-right'>
            <li role='presentation'><a class='dropdown-item' href='index.php'>Trang chủ</a></li>
            <li role='presentation'><a class='dropdown-item' href='userPage.php'>Giỏ hàng</a></li>
            <li role='presentation'><a class='dropdown-item' href='logout.php'>Đăng xuất</a></li>
          </ul>
        </li>
      </ul>";
      } else {
        echo "
      <ul class='navbar-nav ml-auto'>
        <li class='nav-item'>
          <a class='nav-link text-white' href='#'>Giỏ hàng</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link text-white' href='#'>Thông báo</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link text-white' data-toggle='modal' data-target='#login' href='#'>Đăng nhập</a>
        </li>
      </ul>";

        include "registerForm.php";
      }
      ?>

    </nav>

    <!--------------------------BODY-------------------------------->

    <div class="body-content row mt-2">
      <div class="col-lg-2 col-md-2 col-sm-2 col-sm-2"></div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-sm-3 h-100 border rounded " style="background-color:#ebe7e2">
        <h3 class="text-success text-center pt-2 ">Thông tin khách hàng</h4>
          <?php
          $conn = Database::connect();
          if ($conn->connect_errno) {
            die("Connection failed: " . $conn->connect_error);
            exit();
          }
          $sql = "SELECT * FROM account WHERE Username='{$username}'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $idAcc = $row['ID_Account'];
          echo "<p class=\"mb-0\"  style='font-size:1.4em ' >ID: " . $idAcc . "</h5>";
          echo "<p style='font-size:1.4em'>Tên Tài Khoản : " . $row['Username'] . "</p>";
          ?>
      </div>

      <div class="col-lg-5 col-md-5 col-sm-5 col-sm-5">
        <div class="col-lg-2 col-md-2 col-sm-2 col-sm-2"></div>
        <h3 class="text-center" style="color:#414999"><i class='fa fa-check-circle text-success' aria-hidden='true'></i>Đơn Hàng Đã Đặt Thành Công! </h3>
        <h3 class="text-success text-center pt-2 ">Thông tin đơn hàng</h4>
          <table class="table ">
            <div class="row ml-5">
              <p style='font-size:1.4em'>Tên:</h5>
              <p style='font-size:1.4em; text-align: right;' class="col"><?php echo $_POST['name'] ?></p>
            </div>
            <div class="row ml-5 ">
              <p style='font-size:1.4em'>Số điện thoại: </p>
              <p style='font-size:1.4em; text-align: right;' class="col"><?php echo $_POST['sdt'] ?></p>
            </div>
            <div class="row ml-5 ">
              <p style='font-size:1.4em'>Địa chỉ: </p>
              <p style='font-size:1.4em; text-align: right;' class="col"><?php echo $_POST['diachi'] ?></p>
            </div>
            <div class="row ml-5">
              <p style='font-size:1.4em'>Ngày đặt hàng: </p>
              <p style='font-size:1.4em; text-align: right;' class="col"><?php echo $_POST['ngay'] ?></p>
            </div>
            <div class="row ml-5 text-sussces">
              <p style='font-size:1.4em'>Giá tiền: </p>
              <p style='font-size:1.4em; text-align: right;' class="col"><?php echo number_format($_POST['giatien']) ?> đ</p>
            </div>
          </table>
      </div>
      <?php
      $conn1 = Database::connect();
      if ($conn1->connect_errno) {
        die("Connection failed: " . $conn1->connect_error);
        exit();
      }

      $get_last_id = "select max(id_bill)+1 as id_last from bill;";
      if ($result = $conn1->query($get_last_id)) {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id_new = $row['id_last'];
          }
        }
      }

      $sql1 = "INSERT INTO `bill`(`id_bill`, `id_account`, `ten_kh`, `sdt`, `diachi`, `giatien`, `ngay`) 
                VALUES ('$id_new','" .$_POST['id']. "','" .$_POST['name']. "','" .$_POST['sdt']. "','" .$_POST['diachi']. "','" .$_POST['giatien']. "','" .$_POST['ngay']. "');";
      $sql2 = "DELETE FROM `cart` WHERE id_account='" .$_POST['id']. "';";
      
      if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        //echo "Dữ liệu đã được xóa";
      }else echo "Lỗi: " . $conn->error;

      $conn1->close();
      ?>
    </div>
  </div>
  </div>
  </div>
  <div style="margin-top:19%">
    <?php
    include "footer.php";
    ?>
</body>

</html>