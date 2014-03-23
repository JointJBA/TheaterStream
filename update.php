<?php 
include 'core/init.php';
$videoid =  $_GET['videoid'];

$result = mysql_query("SELECT `time`, `status` FROM `users` WHERE `theater_name`='$videoid'");
$timestamp = round(microtime(true) * 1000);
while($row = mysql_fetch_array($result))
{
	echo $row['time'] .','.$row['status'] . ',' . $timestamp;
}
?>