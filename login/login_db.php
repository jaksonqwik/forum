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
                "online" => $user['online']
            ];

            $status = "online";
            $online = "UPDATE `user` SET `online`='$status' WHERE `id`=$user[id]";
            $result = mysqli_query($db->conn, $online);
            header("Location: index.php");
        }
        else{
            $msg = $_SESSION['msg'] = "Пороль или логин неверный";
            header("Location: login.php");
        }
    }
    elseif(mysqli_num_rows($result) == 0){
        $msg = $_SESSION['msg'] = "Пороль или логин неверный";
        header("Location: login.php");
    }
}
else{
    $error = $_SESSION['msg'] = "Введите логин и пороль";
    header("Location: login.php");
}
