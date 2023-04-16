<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$quesion = $db->answer();

if(isset($_POST['btn'])){
    $answer = nl2br($_POST['answer']);
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO `answer`(`id`, `question_id`, `text`, `user_id`) VALUES (NULL,'$question_id','$answer', $user_id)";
    mysqli_query($db->conn, $sql); 
    $db->close();
    header("Location: more.php?id=$question_id");
}
?>