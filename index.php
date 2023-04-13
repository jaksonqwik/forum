<?php
session_start();
include_once "db.php";
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
        <h1>InfoForum</h1>
        <hr>
    </div>
    <div>
        <ul class='qus'>
            <li><a href="login/login.php">Вход</a></li>
            <li><a href="register/register.php">Регистрация</a></li>
            <li><a href="/question/question.php">Задайте вопрос</a></li>
        </ul>
    </div>
    <hr>
</body>
</html>

<?php

foreach($question as $key => $questions){
    echo "<a href='question/more.php'>$questions[1]</a>"." | ".$questions[4]."<br> Теги: ".$questions[2];
    echo "<hr>";
}

?>