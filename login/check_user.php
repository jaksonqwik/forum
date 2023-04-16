<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$user = $db->get_user();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `user` WHERE id=$id";
    $res = mysqli_query($db->conn, $sql);
    $user = mysqli_fetch_assoc($res);
}
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
        <img src="/<?php echo $user['avatar'];?>"
        width="50px" height="50px" alt="" name="user_photo">
        <?php echo $user['login']?>
        <br>
        <div>
            <p>О себе: <?php echo $user['about_me']?></p>
            <p>Страна: <?php echo $user['country']?></p>
        </div>
        <a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Лента</a>
    </div>
    <hr> 
</body>
</html>