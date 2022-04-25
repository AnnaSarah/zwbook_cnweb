<?php
session_start();
$username = $_SESSION['username'];

include "book_ver2.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản Trị</title>

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
                    <h2 class="text-white">ZWBOOK</h2>
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
                        <li role='presentation'><a class='dropdown-item' href='index.php'>Trang Chủ</a></li>
                        <li role='presentation'><a class='dropdown-item' href='indexquantri.php'>Quản trị</a></li>
                        <li role='presentation'><a class='dropdown-item' href='logout.php'>Đăng xuất</a></li>
                    </ul>
                    </li>
                </ul>";
            } else {
                echo "
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                    <a class='nav-link text-white' href='#'>Giỏ hàng</a>
                    </li>
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

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Người đặt hàng</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Giá Tiền</th>
                        <th scope="col">Ngày đặt hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn1 = Database::connect();
                    if ($conn1->connect_errno) {
                        die("Connection failed: " . $conn1->connect_error);
                        exit();
                    }
                    $sql1 = "SELECT * FROM bill ;";
                    if ($result1 = $conn1->query($sql1)) {
                        if ($result1->num_rows > 0) {
                            // output data of each row
                            $count = 1;
                            while ($row1 = $result1->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td scope="col">' . $count . '</td>
                                    <td scope="col">' . $row1['id_bill'] . '</td>
                                    <td scope="col">' . $row1['ten_kh'] . '</td>
                                    <td scope="col">' . $row1['sdt'] . '</td>
                                    <td scope="col">' . $row1['diachi'] . '</td>
                                    <td scope="col">' . number_format($row1['giatien']) . 'đ</td>
                                    <td scope="col">' . $row1['ngay'] . '</td>';
                                echo '</tr>';
                                $count = $count + 1;
                            }
                        } else {
                            echo "<h4>Không có đơn hàng nào !</h4>";
                        }
                    }
                    $conn1->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>