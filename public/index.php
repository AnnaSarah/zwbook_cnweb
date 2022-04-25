<?php
include "book_ver2.php";
include "loginform.php";
$books =  book::selectAll();
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
   <?php include "navbar.php" ?>
    <!-------------------------------------------------->
    <div class="general row">
      <!--body-->
      <div class="category col-lg-2 col-sm-3">
        <!--category-->
        <nav class="navbar d-block" style="background-color:#adcae9">
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
      
      <div class="content col-lg-10 col-sm-9" id="mainScreen">
          <div class="row mt-3">
      <?php  include "slider.php" ?>
          </div>
        <div class="row content-row " >
          <?php foreach ($books as $book) : ?>
            <div class="col-sm-3 col-lg-3  mb-3 mt-3 pt-4">
              <a href="product.php?idSP=<?php echo $book->id ?>">
                <img class="img-fluid img-thumbnail " src='<?php echo $book->image ?>'>
              </a>
              <h3> <a class="text-dark"  href="product.php?idSP=<?php echo $book->id ?>"><?php echo $book->name ?></h3>
              <h6  class="text-danger"><?php echo "Giá : " .  number_format($book->cost) . "VND" ?></h6>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  
  </div>
 <?php
 include "footer.php";
 ?>
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