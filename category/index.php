<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$question = $db->get();
$user = $db->get_user();

foreach($question as $key => $questions){
    echo "<a href='../question/more.php?id=$questions[0]'>$questions[1]</a>"." | ".$questions[3]."<br> Тема: ".$questions[5];
    echo "<br> Задал(а) вопрос: ";
    $user_id = $questions[4];
    $sql = "SELECT * FROM `user` WHERE id=$user_id";
    $user = mysqli_fetch_assoc(mysqli_query($db->conn, $sql));
    echo "<img src='../". (isset($user['avatar']) ? $user['avatar'] : "img/nouser.jpg") . "' width='35px' height='35px' alt='' name='user_photo'> <a href='../login/check_user.php?id={$user['id']}'>".$user['login']."</a><br>";
    echo "<hr>";
}
?>