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
    <div class="title-wrapper">
        <h1>IT-Forum</h1>
        <a href="../index.php" class="home">Лента</a>
    </div>
    <hr>
    <div>
        <h2>Вход</h2>
        <hr>
    </div>
    <div class="form_container">
        <form action="login_db.php" method="POST">
            <div class="form_group">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login">
            </div>
            <div class="form_group">
                <label for="pass">Пороль</label>
                <input type="password" name="pass" id="pass">
            </div>
            <br>
            <div>
                <input type="submit" value="Войти">
            </div>
        </form>
    </div>
    <br>
    <div class="no_pass_login">
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        ?>
    </div>
    <br>
    <div class="link">
        <a href="../register/register.php">Регестрация</a>
    </div>
</body>     
</html>
<?php

?>