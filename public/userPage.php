<?php
session_start();
$username = $_SESSION['username'];

include "book_ver2.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang giỏ hàng</title>

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
          //$sql ="SELECT * FROM `information`";
          $sql = "SELECT * FROM `account` WHERE account.Username='$username' ";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $idAcc = $row['ID_Account'];
          echo "<p class=\"mb-0\"  style='font-size:1.4em ' >ID: " . $idAcc . "</h5>";
          echo "<p style='font-size:1.4em'>Tên Tài Khoản : " . $row['Username'] . "</p>";
          echo "<p style='font-size:1.4em'>Họ tên : Đặng Thu Thảo </p>";
          echo "<p style='font-size:1.4em'>Địa chỉ : Long An, Long Hồ, Vĩnh Long</p>";
          echo "<p style='font-size:1.4em'>Số điện thoại : 0369974524</p>";
          ?>
      </div>

      <div class="col-lg-5 col-md-5 col-sm-5 col-sm-5">
        <div class="col-lg-2 col-md-2 col-sm-2 col-sm-2"></div>
        <h3 class="text-center" style="color:#414999">Giỏ hàng</h3>
        <?php
        $conn1 = Database::connect();
        if ($conn1->connect_errno) {
          die("Connection failed: " . $conn1->connect_error);
          exit();
        }
        $sql1 = "SELECT * FROM cart WHERE ID_Account='{$idAcc}'";
        if ($result1 = $conn1->query($sql1)) {
          if ($result1->num_rows > 0) {
            // output data of each row
            $count = 0;
            $bookcost = 0;
            while ($row1 = $result1->fetch_assoc()) {
              $idSP = $row1['ID_Book'];
              $book =  book::selectByID($idSP);
              $count += 1;
              $bookcost += $book->cost;
              echo "<div class='row ml-3 border-top border-success itemcolor pl-3 mt-3'>
                 <div  class=' col-10 p-0 m-1  '> <p class=' define-size'>" . $count . ". Tên sản phẩm : " . $book->name . "</p>
                        <p  class='pl-5 define-size mb-1'>Giá : " . number_format($book->cost) . "VND</p> </div>
                        <div class='col-1 text-center m-auto'> <a href='delete-cart.php?idcart=" . $book->id . "'><i style=\"font-size:1.5em\"class=\" text-danger fa-solid fa-circle-minus\"></i></a></div> 
                        </div>";
              
            }
          } else {
            echo "<h4>Bạn chưa có sản phẩm trong giỏ hàng</h4>";
          }
        }
        if( isset($bookcost)){
          echo '
          <p style="border:1px solid black;" class="bg-dark mt-2"></p>
          <div class="float-right">
            <h4>Tổng tiền:'.  number_format($bookcost) .'đ</h4>
            <button type="button" class=" ml-5 btn btn-primary" data-toggle="modal" data-target="#thanhtoan">Thanh Toán</button>
          </div>
          ';
        }
        ?>
        
      </div>
    </div>
  </div>
  <div class="modal fade" id="thanhtoan" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Đặt Hàng</h4>
          <button type="button" class="close display-4" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form" action="bill.php" method="POST">
            <input type="text" name="id" hidden value='<?php echo $idAcc?>'>
            <input type="text" name="giatien" hidden value='<?php echo $bookcost?>'>
            <input type="text" name="ngay" hidden value='<?php echo date("Y-m-d")?>'>
            <div class="form-group">
              <label for="user" control-label><i class="fa fa-user" aria-hidden="true"></i>Tên</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên của bạn" required>
            </div>
            <div class="form-group">
              <label for="sdt" control-label><i class="fa fa-phone" aria-hidden="true"></i>SĐT</label>
              <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại có thể liên hệ" required>
            </div>
            <div class="form-group">
              <label for="diachi" control-label> Địa chỉ</label>
              <input type="text" name="diachi" id="diachi" class="form-control" placeholder="Nhập địa chỉ của bạn" required>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary btn-block" class="fa fa-power-off" aria-hidden="true">Đặt Hàng</button>
            </div>
          </form>
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