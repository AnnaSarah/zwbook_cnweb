<?php
include "dbConfig.php";
session_start();

$idSP = $_GET['idSP'];
$user = $_SESSION['username'];
$conn = Database::connect();
$result = $conn->query("SELECT * FROM account WHERE Username='{$user}'");

$row = $result->fetch_assoc();

$idAcc = $row['ID_Account'];

$conn->query("INSERT INTO cart (ID_Account, ID_Book) VALUES ({$idAcc},{$idSP})");
?>