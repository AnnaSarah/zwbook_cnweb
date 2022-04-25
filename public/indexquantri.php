<?php
session_start();
$username = $_SESSION['username'];

include "book_ver2.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản Trị</title>

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
            <!----space--->
            <div class="col-lg-2 col-md-0 col-sm-0"></div>

            <?php
            if (isset($_SESSION['username'])) {
                echo "
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                    <a class='nav-link text-white' href='#'>Thông báo</a>
                    </li>
                    <li class='nav-item '>
                    <a class='nav-link text-white ' data-toggle='dropdown' href='#'>Chào {$_SESSION['username']} </a>
                    ​<ul class='dropdown-menu dropdown-menu-right'>
                        <li role='presentation'><a class='dropdown-item' href='index.php'>Trang Chủ</a></li>
                        <li role='presentation'><a class='dropdown-item' href='quantri.php'>Quản trị</a></li>
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
        <div class="container">
            <div class="row mt-4">
                <div class="col-6 text-center" style="border: 3px solid #5c7ee9;">
                     <h3> Quản lý danh mục </h3>
                    <div>
                        <p class="mt-5 text-dark"> 
                        <a href="quantri_category.php" class="text-dark"><i class="fa-solid fa-box display-1"></i></a>
                          
                    </p>
                </div>                 
                </div>
                <div class="col-6 text-center " style="border: 3px solid #5c7ee9;">
               
                      <h3> Quản lý sách </h3>
                      <div>
                        <p class="mt-5 text-dark"> 
                        <a href="quantri.php" class="text-dark"> <i class="fa-solid fa-book display-1"></i></a>
                        </p>
                </div>
                </div>

            </div>
        </div>
    </div>
    <div style="margin-top: 24%;">
    <?php
    include "footer.php";
    ?>
    </div>
</body>

</html>