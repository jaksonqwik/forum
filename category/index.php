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
    <link rel="stylesheet" href="/style/style.css">
    <title>Лента</title>
</head>
<body>
    <div>
        <h1>IT-Forum</h1>
        <hr>
    </div>
    <div>
        <?php
        if(isset($_SESSION['user']['id'])){
            echo "<img src='../". (isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : "../img/nouser.jpg") . "' width='50px' height='50px' alt='' name='user_photo'>
                  <a href='../seting_profil/profil.php'>" . $_SESSION['user']['login'] . "</a>";
            echo "
                <br>
                <a href='../seting_profil/index.php'>Настройки</a>
                <a href='../index.php'>Выход</a>
                <a href='/question/question.php'>Задайте вопрос</a>
            ";
        }        
        ?>
        <a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Назад</a>
    </div>
    <hr>
</body>
</html>

<?php
foreach($question as $key => $questions){
    echo "Дата: ". date('Y-m-d H:i:s', $questions[6]);
    echo "<br>";
    echo "<a href='../question/more.php?id=$questions[0]'>$questions[1]</a>"." | ".$questions[3]."<br> Тема: ".$questions[5];
    echo "<br> Задал(а) вопрос: ";
    $user_id = $questions[4];
    $sql = "SELECT * FROM `user` WHERE id=$user_id";
    $user = mysqli_fetch_assoc(mysqli_query($db->conn, $sql));
    echo "<img src='../". (isset($user['avatar']) ? $user['avatar'] : "img/nouser.jpg") . "' width='35px' height='35px' alt='' name='user_photo'> <a href='../login/check_user.php?id={$user['id']}'>".$user['login']."</a><br>";
    echo "<hr>";
}
?>