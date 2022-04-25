<?php
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['login'])) 
{
    //Kết nối tới database
    include('dbConfig.php');
    $conn = Database::connect();
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = $conn->query("SELECT Username, Password FROM account WHERE Username='$username'");
    if ($query->num_rows == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        header("Location: index.php?name=f");
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = $query->fetch_array();
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['Password']) {
        echo "Mật khẩu không đúng. <a href='javascript: history.go(-1)'>Trở lại</a>";
        header("Location: index.php?pwd=f");
        exit;
    }
     
    //Lưu tên đăng nhập
    session_start();
    $_SESSION['username'] = $username;
    
}
?>
<script type="text/javascript">
    window.open("index.php","_self");
</script>