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
    <link rel="stylesheet" href="/style/style.css">
    <title>Вопрос</title>
</head>
<body>
    <div>
        <h1>InfoForum</h1>
        <hr>
    </div>
    <div>
        <h2>Новый вопрос<h2>
        <hr>
    </div>
    <form action="/question/add_question.php" method="POST">
        <li><a href="/index.php">Лента</a></li>
        <div>
            <label for="question">Тема вопроса</label>
            <br>
            <input type="text" id="question" name="question_subject">
        </div>
        <br>
        <div>
            <label for="">Теги вопроса</label>
            <br>
            <input type="text" name="tegs_question">
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
            <input type="submit" value="Опубликовать">
            <input type="submit" value="Предросмотр">
        </div>
    </form>
</body>
</html>


<?php


?>