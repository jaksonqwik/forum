<?php
session_start();
include_once "../db.php";
$db = new Database();
$db->connect();
$quesion = $db->get();

if(isset($_POST['btn_q'])){
    $question_subject = $_POST['question_subject'];
    $category = $_POST['category'];
    $key_point = $_POST['key_point'];
    $complex_subject = $_POST['complex_subject'];
    $user_id = $_SESSION['user']['id'];
    $date_created = time();

    $sql = "INSERT INTO `question`(`id`, `question_subject`, `key_point`, `complex_subject`, `user_id_question`, `category`, `data`) 
    VALUES (NULL,'$question_subject','$key_point','$complex_subject','$user_id','$category', $date_created)";
    mysqli_query($db->conn, $sql);
    header("Location: ../login/index.php");
    $db->close();
    }
?>