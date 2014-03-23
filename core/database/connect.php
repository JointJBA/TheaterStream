<?php 
$connect_error = "sorry we are experiencing database connection issues";
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('TheaterStream') or die($connect_error);
?>