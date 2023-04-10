<?php
include_once "../db.php";
$db = new Database();
$db->connect();
$quesion = $db->get_questions();

$question_subject = $_POST['question_subject'];
$tegs_question = $_POST['tegs_question'];
$key_point = $_POST['key_point'];
$complex_subject = $_POST['complex_subject'];

$sql = "INSERT INTO `question`(`id`, `question_subject`, `tegs_question`, `key_point`, `complex_subject`) 
VALUES (NULL, '$question_subject', '$tegs_question', '$key_point', '$complex_subject')";
mysqli_query($db->conn, $sql); 
header("Location: ../index.php");
$db->close();
?>