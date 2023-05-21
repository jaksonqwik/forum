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
    <link rel="stylesheet" href="../style/style.css">
    <title>Профиль пользователя</title>
</head>
<body>
    <div>
        <span><h1>IT-Forum</h1></span>
    </div>
    <hr>
    <div>
        <a href="/<?php echo isset($user['avatar']) ? $user['avatar'] : "../img/nouser.jpg";?>">
            <img src="/<?php echo isset($user['avatar']) ? $user['avatar'] : "../img/nouser.jpg";?>"
        width="50px" height="50px" alt="" name="user_photo"></a>
        <br>
        <?php echo $user['login']?>
        <br>
        <div>
            <p>О себе: <?php echo $user['about_me']?></p>
            <p>Страна: <?php echo $user['country']?></p>
            <p><?php
            if($user['online'] == "online"){
                echo "В сети";
                echo "<img src='../img/green.png' alt='' name='green'  width='10px'>";
            }
            else{
                echo "Был в сети: ".$user['online'];
                echo "<img src='../img/red.png' alt='' name='red'  width='10px'>";
            }
            ?></p>
        </div>
        <a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Лента</a>
    </div>
    <hr> 
</body>
</html>