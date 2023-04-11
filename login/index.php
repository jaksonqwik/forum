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
        <h1>Страйт</h1>
        <hr>
    </div>
    <div>
        <p><?= $_SESSION['user']['login']?></p>
        <p><?= $_SESSION['user']['email']?></p>
        <a href="../index.php">Выход</a>
    </div>
    <hr>
</body>
</html>

<?php

foreach($question as $key => $questions){
    echo "<a href='../question/more.php'>$questions[1]</a>"." | ".$questions[4]."<br> Теги: ".$questions[2];
    echo "<hr>";
}

?>