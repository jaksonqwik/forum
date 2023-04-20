<?php
session_start();
include_once "db.php";
$db = new Database();
$db->connect();
$question = $db->get();
$user = $db->get_user();
unset($_SESSION['user']['id']);
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
        <span><h1>IT-Forum</h1></span>
        <ul class='qus'>
            <li><a href="login/login.php">Вход</a></li>
            <li><a href="register/register.php">Регистрация</a></li>
        </ul>
    </div>
    <hr>
    <div>
        <ul class="category">
            <li><a href="../category/index.php">Все темы</a></li>
            <li><a href="../category/category_php.php">PHP</a></li>
            <li><a href="../category/category_js_ts.php">JS/TS</a></li>
            <li><a href="../category/category_html_css.php">HTML/CSS</a></li>
            <li><a href="../category/category_c_c++.php">C/C++</a></li>
            <li><a href="../category/category_py.php">Python</a></li>
            <li><a href="../category/category_java.php">Java</a></li>
            <li><a href="../category/category_go.php">Go</a></li>
            <li><a href="../category/category_rust.php">Rust</a></li>
            <li><a href="../category/category_c_sharp.php">C#</a></li>
            <li><a href="../category/category_r.php">R</a></li>
            <li><a href="../category/category_kotlin_swift.php">Kotlin/Swift</a></li>
        </ul>
    </div>
</body>
</html>