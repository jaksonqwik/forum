<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();

if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM user WHERE login='$login'";
    $result = mysqli_query($db->conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($pass, $user['pass'])) {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "email" => $user['email']
            ];
            
            header("Location: index.php");
        }
    }
}
