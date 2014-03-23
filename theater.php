<?php 
include 'core/init.php';
include 'includes/overall/header.php'; 

if (logged_in() && (empty($_GET) || $_GET['theater_name']== $user_data['theater_name'])){
	include 'includes/theater/logged_in_theater.php';
}else{
	if (empty($_GET) === true) {
		header('Location:index.php');	}
	include 'includes/theater/not_logged_in_theater.php';
}
?>


<?php include 'includes/overall/footer.php'; ?>