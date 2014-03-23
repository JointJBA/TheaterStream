<?php 
session_start();

error_reporting(E_ERROR);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/theater.php';

if(logged_in()){
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'theater_name', 'password', 'start_time', 'video_path', 'video_link', 'theater_title', 'time', 'status');
}


$errors = array();
?>