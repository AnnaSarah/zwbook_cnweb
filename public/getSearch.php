<?php
include "book_ver2.php";
$books =  book::selectByName($_GET['name']);
?>
<div class="row" id="mainScreen">
    <?php foreach($books as $book): ?>
        <div class="col-sm-3 col-lg-3  mb-3 mt-3 pt-4">
            <a href="product.php?idSP=<?php echo $book->id?>">
                <img class="img-fluid img-thumbnail" src='<?php echo $book->image ?>'>
            </a>  
            <h3><?php echo $book->name?></h3>
            <h6 class="text-danger"><?php echo "Giá : ".$book->cost."VND"?></h6>
    	</div>
    <?php endforeach ?> 
</div>
