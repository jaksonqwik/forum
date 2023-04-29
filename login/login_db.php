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
                "email" => $user['email'],
                "avatar" => $user['avatar'],
                "about_me" => $user['about_me'],
                "country" => $user['country'],
            ];
            
            $online = time();
            $id = $_SESSION['user']['id'];

            $query1 = "UPDATE `user` SET `online`='$online' WHERE `id`=$id";
            $result1 = mysqli_query($db->conn, $query1);

            header("Location: index.php");
        }
    }
    elseif(mysqli_num_rows($result) == 0){
        $msg = $_SESSION['msg'] = "Пороль или логин не верный";
        header("Location: login.php");
    }
}
