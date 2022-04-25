<?php
if (isset($_GET['submit'])) {
    //Kết nối tới database
    include('dbConfig.php');
    $conn = Database::connect();

    $id= $_GET['id']; echo $id;
    if (count($_GET) > 0){
        $sql = "DELETE FROM `book` WHERE book.ID_Book='$id';"; 
        $sql1 = "DELETE FROM `cart` WHERE  cart.ID_Book='$id';";

        //Nếu kết quả kết nối không được thì báo lỗi và thoát
        if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE ) {
            echo "Dữ liệu đã được xóa";
            header("Location: quantri.php");
        } else {
            echo "Lỗi delete: " . $conn->error;
        }
    }
    $conn->close();

}
?>