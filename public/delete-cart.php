<?php
if (isset($_GET['idcart'])) {
    //Kết nối tới database
    include('dbConfig.php');
    $conn = Database::connect();

    $id= $_GET['idcart'];
   // echo $id;
    if (count($_GET) > 0){
        $sql = "DELETE FROM `cart` WHERE  cart.ID_Book='$id';";

        //Nếu kết quả kết nối không được thì báo lỗi và thoát
        if ($conn->query($sql) === TRUE  ) {
             
            header("Location: userPage.php");
        } else {
            echo "Lỗi delete: " . $conn->error;
        }
    }
    $conn->close();

}
?>