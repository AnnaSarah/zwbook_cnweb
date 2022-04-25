<?php
session_start();
$username = $_SESSION['username'];

include "book_ver2.php";

$id = $_GET['id'];
$conn = Database::connect();
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}
$sql = "SELECT `ID_Book`, `ID_Category`, `Name_Book`, `Cost`, `Link` FROM `book` WHERE id_book='$id'; ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$type = $row['ID_Category'];
$name = $row['Name_Book'];
$cost = $row['Cost'];
$link = $row['Link'];

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sửa thông tin sách</title>

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
                    <h2 class="text-white">ZWBOOK </h2>
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
                        <li role='presentation'><a class='dropdown-item' href='quantri.php'>Quản trị</a></li>
                        <li role='presentation'><a class='dropdown-item' href='logout.php'>Đăng xuất</a></li>
                    </ul>
                    </li>
                </ul>";
            } else {
                echo "
                <ul class='navbar-nav ml-auto'>
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
        <div class="container mt-5">
            <form method="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Phân Loại Sách</th>
                            <th scope="col">Tên Sách</th>
                            <th scope="col">Giá Tiền</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control form-control-sm" name="type" id="type" value="<?php echo $type; ?>">
                                    <option value="1">Truyện Tranh</option>
                                    <option value="2">Sách Giáo Khoa</option>
                                    <option value="3">Sách Văn Học</option>
                                    <option value="4">Sách Kinh Tế</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="name" id="name" required value="<?php echo $name; ?>">
                            </td>
                            <td>
                                <input type="text" name="cost" id="cost" required value="<?php echo $cost; ?>">
                            </td>
                            <td>
                                <div class="form-group">
                                    <img src="<?php echo $link; ?>" width="50px">
                                    <input type="file" class="form-control-file" name="image" id="image"  value="<?php echo $link; ?>">
                                </div>
                            </td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary m-0 p-1" title="Thêm sách">Sửa</button>&nbsp;&nbsp;
                                <a href="/quantri.php"><i class="fa fa-chevron-circle-left  fa-lg" aria-hidden="true" title="Quay về trang quản trị"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php
            if (isset($_POST['submit']) && $_POST['submit'] !== NULL) {
                $type = $_POST['type'];
                $name = $_POST['name'];
                $cost = $_POST['cost'];
                if($_POST['image'] == NULL){
                    $_POST['image'] = $link;
                    $link = $link;
                }else
                $link = "img/" . $_POST['image'];
                //echo $type. $name.$cost .$link;
                $conn = Database::connect();
                if ($conn->connect_errno) {
                    die("Connection failed: " . $conn->connect_error);
                    exit();
                }
                $sql = "UPDATE `book` SET `ID_Book`='$id',`ID_Category`='$type',`Name_Book`='$name',`Cost`='$cost',`Link`='$link' WHERE `ID_Book`='$id';";
                if ($conn->query($sql) === TRUE) {
                    echo "<i class='fa fa-check-circle text-success' aria-hidden='true'></i> Cập nhật thành công!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            ?>
        </div>
    </div>
    <div style="margin-top:23%">
    <?php
    include "footer.php";
    ?>
    </div>
</body>

</html>