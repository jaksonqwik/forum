<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$question = $db->get();
$user = $db->get_user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
</head>
<body>
    <div>
        <h1>IT-Forum</h1>
        <hr>
    </div>
    <div>
        <img src="../<?php if(isset($_SESSION['user']['avatar'])){
            echo $_SESSION['user']['avatar'];
        } 
        else{
           echo "../img/nouser.jpg";
        }
        ?>"width="50px" height="50px" alt="" name="user_photo">
        <?= $_SESSION['user']['login']?>
        <br>
        <div>
            <p>О себе: <?= $_SESSION['user']['about_me']?></p>
            <p>Страна: <?= $_SESSION['user']['country']?></p>
        </div>
        <a href="index.php">Настройки</a>
        <a href="../index.php">Выход</a>
        <a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Лента</a>
    </div>
    <hr> 
</body>
</html>