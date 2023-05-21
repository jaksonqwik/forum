<?php
session_start();
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
    <link rel="stylesheet" href="../style/login.css">
    <title>Вход</title>
</head>
<body>
    <div>
        <span><h1>IT-Forum</h1></span>
    </div>
    <hr>
    <div>
        <h2>Вход</h2>
        <hr>
    </div>
    <form action="login_db.php" method="POST">
        <div>
            <label for="">Логин</label>
            <br>
            <input type="text" name="login">
        </div>
        <div>
            <label for="">Пороль</label>
            <br>
            <input type="password" name="pass">
        </div>
        <br>
        <div>
            <input type="submit" value="Войти">
        </div>
    </form>
    <br>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        ?>
    <br>
    <a href="../register/register.php">Регестрация</a>
    <a href="../index.php">Лента</a>
</body>
</html>
<?php

?>