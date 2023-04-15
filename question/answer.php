<?php
include_once "../db.php";
$db = new Database();
$db->connect();
$quesion = $db->answer();

if(isset($_POST['btn'])){
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $sql = "INSERT INTO `answer`(`id`, `question_id`, `text`) VALUES (NULL,'$question_id','$answer')";
    mysqli_query($db->conn, $sql); 
    $db->close();
    header("Location: more.php?id=$question_id");
}
?>