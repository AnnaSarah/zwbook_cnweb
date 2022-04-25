<?php 
     $conn = Database::connect();
     if ($conn->connect_errno) {
       die("Connection failed: " . $conn->connect_error);
       exit();
     }
     $getfile = "SELECT * FROM banner WHERE active = 1";
     $result = $conn->query($getfile);
   $stt = 0;
    while ( $hinh = $result->fetch_assoc()){
        $file[$stt] = $hinh['file'];
        $stt++;
    }
    ?>
<div id="slidershow" class="carousel slide h-25 w-100" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#slidershow" data-slide-to="0" class="active"></li>
    <?php
         for ($i = 1; $i < $stt; $i++) {
            echo " <li data-target=\"#slidershow\" data-slide-to=\"$i\"></li>";
          }

    ?>
   
  </ol>
  <div class="carousel-inner ">
    <div class="carousel-item active">
      <img class="img-fluid h-100 w-100" <?php echo' src="'.$file[0].'" '?> alt="First slide">
    </div>
    <?php
        for ($s =1 ;$s<$stt ;$s++){
            echo "
            <div class=\"carousel-item\">
                <img class=\" img-fluid h-100 w-100 \" src=\"".$file[$s]."\" alt=\"Second slide\">
            </div>
            ";
        }
    ?>
  </div>
  <a class="carousel-control-prev " href="#slidershow" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon w-25 h-25 bg-secondary rounded-circle" aria-hidden="true"></span>
    <span class="sr-only ">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slidershow" role="button" data-slide="next">
    <span class="carousel-control-next-icon w-25 h-25  bg-secondary rounded-circle" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
