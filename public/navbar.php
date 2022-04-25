<nav class="navbar navbar-expand-sm bg-primary row">

<div class="col-lg-4 col-md-4 col-sm-4 col-sm-4">
  <a href="index.php">
    <h2 class="text-white">ZWBOOK</h2>
  </a>
</div>

<div class="col-lg-4 col-md-5">
  <div class="input-group">
    <input class="form-control" type="text" placeholder="Type here" id="search" name="search"></input>
    <a class="input-group-append" onclick="showSearchBook(document.getElementById('search').value)" href="#">
      <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
    </a>
  </div>
</div>
<!----space--->
<div class="col-lg-2 col-md-0 col-sm-0"></div>
<?php
    session_start();
    if (isset($_SESSION['username'])) {
    echo "
    <ul class='navbar-nav ml-auto'>
    <li class='nav-item'>
        ";
    if ($_SESSION['username'] == "root") {
    } else {
        echo "<a class='nav-link text-white' href='userPage.php'>Giỏ hàng</a>";
    }
    echo "
    </li>
    <li class='nav-item'>
        <a class='nav-link text-white' href='#'>Thông báo</a>
    </li>
    <li class='nav-item '>
        <a class='nav-link text-white ' data-toggle='dropdown' href='#'>Chào {$_SESSION['username']} </a>
        ​<ul class='dropdown-menu dropdown-menu-right'>
        ";
    if ($_SESSION['username'] == "root") {
        echo "<li role='presentation'><a class='dropdown-item' href='indexquantri.php'>Quản trị</a></li>";
    } else {
        echo "<li role='presentation'><a class='dropdown-item' href='userPage.php'>Trang cá nhân</a></li>";
    }
    echo "
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
        <a class='nav-link text-white' data-toggle='modal' data-target='#login' href='#' id='dangnhap'>Đăng nhập</a>
    </li>
    </ul>";

    include "registerForm.php";
    
    }
?>

</nav>