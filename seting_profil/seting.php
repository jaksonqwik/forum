<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$db->get_user();

$id = $_SESSION['user']['id'];
$about_me = isset($_POST['about_me']) ? $_POST['about_me'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';
$path = '';
if (!empty($_FILES['avatar']['name'])) {
    $path = "img/" . time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path);
}

$sql = "UPDATE `user` SET ";
if (!empty($path)) {
    $sql .= "`avatar`='$path', ";
}
if (!empty($about_me)) {
    $sql .= "`about_me`='$about_me', ";
}
if (!empty($country)) {
    $sql .= "`country`='$country', ";
}
$sql = rtrim($sql, ', ');
$sql .= " WHERE `id`='$id'";

mysqli_query($db->conn, $sql);

header("Location: ../login/index.php");
$db->close();
?>
