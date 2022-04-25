<?php
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 

    //Kết nối tới database
    include "dbConfig.php";
    $conn = Database::connect();
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['res-username']);
    $password = addslashes($_POST['res-password']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    // $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = $conn->query("INSERT INTO account (Username, Password) VALUES ('{$username}','{$password}')");
    

?>

<script type="text/javascript">
    window.open("index.php","_self");
</script>