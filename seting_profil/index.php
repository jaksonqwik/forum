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
        <h1>IT-Forum</h1>
        <hr>
    </div>
    <div>
        <a href="../../login/index.php">Лента</a>
        <a href="profil.php">Профиль</a>
    </div>
    <div>
        <h4>Настройки профиля</h4>
    </div>
    <div>
        <form action="seting.php" method="POST" enctype = "multipart/form-data">
            <div>
                <label for="">Фото</label>
                <br>
                <input type="file" name = "avatar">
            </div>
            <br>
            <div>
                <label for="">Кратко о себе</label>
                <br>
                <input type="text" name = "about_me">
            </div>
            <br>
            <div>
                <label for="">Страна</label>
                <br>
                <input type="text" name = "country">
            </div>
            <br>
            <input type="submit" value="Сохранить">
        </form>
    </div>
</body>
</html>