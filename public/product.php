<?php
include "loginform.php";
include "book_ver2.php";

if (isset($_GET['idSP'])){
  $idSP=addslashes($_GET['idSP']);
  $book =  book::selectByID($idSP);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chi tiết sản phẩm</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <script type="text/javascript" src="showBook.js"></script>


</head>
<body>

<div class="container-fluid">
  <?php include "navbar.php" ?>
   
  <!--------------------------BODY-------------------------------->
  <div class="body-content row mt-3">
    <div class="col-lg-1 col-md-1 col-sm-1 col-sm-1"></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-sm-3">
      <img class="img-fluid img-thumbnail" src='<?php echo $book->image ?>' >
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-sm-6">
    <h2 class="large">Thông tin sản phẩm</h2>
      <p style="font-size:1.8em" ><?php echo "Tên sản phẩm : ".$book->name?></p>
      <h4  class="text-danger"><?php echo "Giá : ". number_format($book->cost)."VND"?></p>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialog1" onclick="addToCart(<?php echo $idSP?>)" >Thêm vào giỏ hàng</button>
    </div>
  </div>
  <?php
  if (isset($_SESSION['username'])){
  echo '
  <div class="modal fade" id="dialog1"tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
                <h4 class="modal-title">Thông báo </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <h3 class="modal-body text-success">
                Thêm sản phẩm thành công
            </h3>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
               
            </div>

</div>

';}
?>



<script type="text/javascript">

  function addToCart(idSP){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","addToCart.php?idSP="+idSP,true);
  xmlhttp.send();
}
   
</script>
</body>
</html>