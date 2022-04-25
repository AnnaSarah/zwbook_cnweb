<?php
include "book_ver2.php";
include "loginform.php";
$books =  book::selectAll();
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang chủ </title>
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
                        <li role='presentation'><a class='dropdown-item' href='indexquantri.php'>Quản trị</a></li>
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
    <!-------------------------------------------------->
    <div class="general row">
      <!--body-->
      <div class="category col-lg-2 col-sm-3">
        <!--category-->
        <nav class="navbar bg-light d-block">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link text-dark"><i class="fa-solid fa-bars"></i> Danh mục</a>
            </li>
            <?php 
     ?>
    <?php  
        $categorys =  book::displayCategory();
        foreach ($categorys as $category) :  
            echo ' <li class="nav-item nav-hover">
                    <a class="nav-link text-dark pl-3" name="comicBar" onclick="showComic()" href="view_product.php?id='. $category['id_category'].'">'. $category['name_category'].'
                    </a>
                    </li>';
       endforeach 
    ?>  
          </ul>
        </nav>
      </div>
    
      <div class="content col-lg-10 col-sm-9">
        <div class="row" id="mainScreen">
          <?php 
           $id = $_GET['id'];
           $sebook = Book::selectBook($id); foreach ($sebook as $sbook) : ?>
            <div class="col-sm-3 col-lg-3  mb-3 mt-3 pt-4">
              <a href="product.php?idSP=<?php echo $sbook->id ?>">
                <img class="img-fluid img-thumbnail " src='<?php echo $sbook->image ?>'>
              </a>
              <h3><a class="text-dark" href="product.php?idSP=<?php echo $sbook->id ?>"><?php echo $sbook->name ?></a></h3>
              <h6  class="text-danger"><?php echo "Giá : " . number_format($sbook->cost) . "VND" ?></h6>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div> 
  </div>
  <div style="margin-top:4%">
  <?php
    include "footer.php";
    ?>
  </div>
  <script>
    function relogin (){
        $('#dangnhap').trigger('click');
    }
    if($('#f1').length || $('#f2').length){
      relogin ();
    }
  </script>
</body>
</html>