<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$question = $db->get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вопрос</title>
</head>
<body>
    <div>
        <h1>InfoForum</h1>
        <hr>
    </div>
    <a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Лента</a>
    <?php
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `question` WHERE id=$id";
    $res = mysqli_query($db->conn, $sql);
    $question = mysqli_fetch_assoc($res);
    }
    ?>
    <h2><?php echo $question['question_subject']; ?></h2>
    <p>Теги: <?php echo $question['tegs_question']; ?></p>
    <p>Суть вопроса: <?php echo $question['key_point']; ?></p>
    <a href="">Ответить</a>
</body>
</html>