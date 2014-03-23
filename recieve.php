<?php 
include 'core/init.php';
$id = $_GET['videoid'];
$status = $_GET['status'];
$time = $_GET['time'];

mysql_query("UPDATE `users` SET `time`='$time', `status`='$status' WHERE `theater_name` ='$id'");

?>