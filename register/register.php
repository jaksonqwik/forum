<?php
include_once "../db.php";
$db = new Database();
$db->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регестрация</title>
</head>
<body>
    <div>
        <h1>IT-foForum</h1>
        <hr>
    </div>
    <div>
        <h2>Регестрация</h2>
        <hr>
    </div>
    <form action="register_db.php" method="POST">
        <div>
            <label for="">Логин</label>
            <br>
            <input type="text" name="login">
        </div>
        <div>
            <label for="">Почта*</label>
            <br>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="">Пороль*</label>
            <br>
            <input type="password" name="pass" required>
        </div>
        <br>
        <div>
            <input type="submit" value="Регистрация">
        </div>
        <a href="../login/login.php">Войти</a>
    </form>
</body>
</html>

<?php


?>