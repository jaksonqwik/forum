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
    <link rel="stylesheet" href="/style/style.css">
    <title>Вопрос</title>
</head>
<body>
    <div>
        <h1>IT-Forum</h1>
        <hr>
    </div>
    <div>
        <h2>Новый вопрос<h2>
        <hr>
    </div>
    <form action="/question/add_question.php" method="POST">
        <li><a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Лента</a></li>
        <br>
        <div>
            <label for="question">Вопрос</label>
            <br>
            <input type="text" id="question" name="question_subject">
        </div>
        <br>
        <div>
            <label for="">Тема:</label>
            <select name="category">
                <option>Python</option>
                <option>Java</option>
                <option>C/C++</option>
                <option>C#</option>
                <option>PHP</option>
                <option>JS/TS</option>
                <option>HTML/CSS</option>
                <option>Rust</option>
                <option>Go</option>
                <option>R</option>
                <option>Kotlin/Swift</option>
            </select>
        </div>
        <br>
        <div>
            <label for="">Суть вопроса</label>
            <br>
            <textarea class="field__input textarea" data-required="true" name="key_point" rows="8" tabindex="3"></textarea>
        </div>
        <br>
        <label for="">Сложность вопроса</label>
        <br>
        <select name="complex_subject">
            <option>Простой</option>
            <option>Средний</option>
            <option>Сложный</option>
        </select>
        <br>
        <div>
            <input type="hidden" name="user_id" value="<?php isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : ''?>">
            <input type="submit" value="Опубликовать" name="btn_q">
        </div>
    </form>
</body>
</html>


<?php


?>