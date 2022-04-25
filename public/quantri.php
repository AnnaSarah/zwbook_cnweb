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
            <a href="/add.php" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> New Book</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Phân Loại Sách</th>
                        <th scope="col">Tên Sách</th>
                        <th scope="col">Giá Tiền</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = Database::connect();
                    if ($conn->connect_errno) {
                        die("Connection failed: " . $conn->connect_error);
                        exit();
                    }
                    //$sql = " Select `ID_Book`, `ID_Category`, `Name_Book`, `Cost`, `Link` FROM `book` ";
                    $sql = "Select * FROM `book`, `category` WHERE  book.ID_Category=category.id_category  Order by book.ID_Category ASC; ";
                    
                    $i = 1;
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            //output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '    <th scope="row">' . $i . '</th>';
                                echo '    <td><h6>' .$row['name_category'] . '</td>';
                                echo '    <td>' . $row['Name_Book'] . '</td>';
                                echo '    <td>' . number_format($row['Cost']) . ' VND</td>';
                                echo '    <td><img src="' . $row['Link'] . '" width="50px"></td>';
                                echo '    <td>';
                                echo '      <a href="/edit.php?id=' .$row['ID_Book'] . '"><i class="fa fa-pencil" aria-hidden="true" title="Sửa">&nbsp;&nbsp;</i></a>';
                                echo '      <a data-toggle="modal" data-target="#delete' . $i . '" href="#" id="xoabook" ><i class="fa fa-trash " aria-hidden="true" title="Xóa"></i></a>';
                                echo '    </td>';
                                echo '</tr>';
                                
                                echo '
                                    <div class="modal fade" id="delete' . $i . '" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div>
                                                        <h4 class="modal-title">Xóa Sách</h4>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bạn có muốn xóa '. $row['Name_Book']. '?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form role="form" action="delete.php" method="GET">
                                                        <input type="text" name="id" value="'.  $row['ID_Book'] .'" hidden>
                                                        <div class="form-group" > 
                                                            <button type="submit" name="submit" value="submit" class="btn btn-danger btn-block"class="fa fa-power-off" aria-hidden="true">Xóa</button>                 
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                                $i = $i + 1;
                            }
                        } else {
                            echo "<p>Cơ sở dữ liệu trống</p>";
                        }
                    }
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