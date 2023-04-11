<?php
include_once "../db.php";
$db = new Database();
$db->connect();
$user = $db->get_user();

$login = $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO `user`(`id`, `login`, `email`, `pass`) VALUES (NULL,'$login','$email','$hash')";
mysqli_query($db->conn, $sql);
header("Location: ../login/login.php");
$db->close();
?>