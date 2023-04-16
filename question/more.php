<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$question = $db->get();
$answer = $db->answer();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `question` WHERE id=$id";
    $res = mysqli_query($db->conn, $sql);
    $question = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $question['question_subject']; ?></title>
</head>
<body>
    <div>
        <h1>IT-Forum</h1>
        <hr>
    </div>
    <a href="<?php echo isset($_SESSION['user']['id']) ? '../login/index.php' : '../index.php'; ?>">Лента</a>
    <hr>
    <h2><?php echo $question['question_subject']; ?></h2>
    <p>Теги: <?php echo $question['tegs_question']; ?></p>
    <p>Суть вопроса: <?php echo $question['key_point']; ?></p>
    <hr>
    <div>
        <?php
        if(isset($_GET['id'])){
            $answer_id = $_GET['id'];
            $user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
            $sql = "SELECT * FROM `answer` WHERE question_id=$answer_id";
            $res = mysqli_query($db->conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                echo "<h3>Ответы:</h3>";
                while ($row = mysqli_fetch_assoc($res)) {
                    $user_sql = "SELECT * FROM `user` WHERE id=" . $row['user_id'];
                    $user_res = mysqli_query($db->conn, $user_sql);
                    $user = mysqli_fetch_assoc($user_res);
                    echo "<hr>";
                    echo "<p>Ответил(а): <br>" . "<img src=../" . $user['avatar'] . " 
                    width='35px' height='35px' alt='' name='user_photo'> 
                    <a href='../login/check_user.php?id=$user[id]'>". $user['login'] . "</a> </p>";
                    echo "<ul>";
                    echo "<p>" . $row['text'] . "</p>";
                    echo "</ul>";
                }
            }
            else {
                echo "Нет ответов на этот вопрос.";
                echo "<hr>";
            }
        }
        ?>
    </div>
    <?php
    if(isset($_SESSION['user']['id'])){
        echo "
        <form action='answer.php' method='POST'>
        <textarea name='answer' placeholder='Ответить'></textarea>
        <input type='hidden' name='question_id' value='" . $question['id'] . "'>
        <input type='hidden' name='user_id' value='" . (isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '') . "'>
        <br>
        <input type='submit' name='btn' value='Отправить'>
        </form>
        ";
    }
    else{
        
    }
    ?>
</body>
</html>