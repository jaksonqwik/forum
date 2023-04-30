<?php
session_start();
include_once "db.php";
$db = new Database();
$db->connect();
$question = $db->get();
$user = $db->get_user();
if(isset($_SESSION['user']['id'])){
    $status = date("h:i:s");
    $userid =  $_SESSION['user']['id'];
    $online = "UPDATE `user` SET `online`='$status' WHERE `id`='$userid'";
    $result = mysqli_query($db->conn, $online);
}
unset($_SESSION['user']['id']);
?>