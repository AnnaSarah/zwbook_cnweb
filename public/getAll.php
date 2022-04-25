<?php
include "book_ver2.php";
$books =  book::selectAll();
?>
<div class="row" id="mainScreen">
        <?php foreach($books as $book):?>

            <div class="col-sm-3 col-lg-3">
            <a href="product.php?idSP=<?php echo $book->id?>">
            <img class="img-fluid img-thumbnail" src='<?php echo $book->image ?>'>
            </a>
            <p><?php echo $book->name?></p>
            <p><?php echo "Gia : ".$book->cost."VND"?></p>
            </div>
        <?php endforeach ?> 
</div>