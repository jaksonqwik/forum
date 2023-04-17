<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$quesion = $db->get();

if(isset($_POST['btn_q'])){
    $question_subject = $_POST['question_subject'];
    $tegs_question = $_POST['tegs_question'];
    $key_point = $_POST['key_point'];
    $complex_subject = $_POST['complex_subject'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO `question`(`id`, `question_subject`, `tegs_question`, `key_point`, `complex_subject`, 
    `user_id_question`) VALUES (NULL, '$question_subject', '$tegs_question', '$key_point', '$complex_subject', $user_id)";
    mysqli_query($db->conn, $sql); 
    header("Location: ../login/index.php");
    $db->close();
    }
?>