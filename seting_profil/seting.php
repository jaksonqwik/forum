<?php
include_once "../db.php";
$db = new Database();
$db->connect();
$db->get_user();
?>
