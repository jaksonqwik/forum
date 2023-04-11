<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$get_user = $db->get_user();

$login = $_POST['login'];
$pass = $_POST['pass'];

foreach ($get_user as $key => $user) {
    if($login == $user[1] && password_verify($pass, $user[3])){
        header("Location: ../index.php");
    }
}
?>