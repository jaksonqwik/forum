<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$db->get_user();


$id = $_SESSION['user']['id'];
$adbout = $_POST['about_me'];
$country = $_POST['country'];
$path = "img/" . time() . $_FILES['avatar']['name'];
move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path);

$sql = "UPDATE `user` SET `avatar`='$path', `about_me`='$adbout', `country`='$country' WHERE `id`='$id'";
mysqli_query($db->conn, $sql);
header("Location: ../login/index.php");
$db->closq();
?>