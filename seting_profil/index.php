<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$user = $db->get_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
</head>
<body>
    <div>
        <h1>InfoForum</h1>
        <hr>
    </div>
    <div>
        <a href="../../login/index.php">Лента</a>
    </div>
    <div>
        <h4>Настройки профиля</h4>
    </div>
    <div>
        <form action="seting.php" method="POST" enctype = "multipart/form-data">
            <label for="">Фото</label>
            <br>
            <input type="file" name = "avatar">
            <br>
            <label for="">О себе</label>
            <br>
            <input type="text" name = "about_me">
            <br>
            <label for="">Страна</label>
            <br>
            <input type="text" name = "country">
            <br>
            <input type="submit" value="Сохранить">
        </form>
    </div>
</body>
</html>