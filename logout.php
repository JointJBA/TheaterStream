<?php 


include 'core/init.php';

$theater_name= $user_data['theater_name'];

mysql_query("UPDATE `users` SET `status`='1' WHERE `theater_name` ='$theater_name'");


session_start();
session_destroy();
header('Location: index.php');

?>