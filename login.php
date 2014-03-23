<?php 
include 'core/init.php';


if (empty($_POST)=== false) {
	$theater_name = $_POST['theater_name'];
	$password = $_POST['password'];

	if (empty($theater_name) || empty($password)) {
		$errors[] = 'You need to enter a theater_name and password';
	} else if (user_exists($theater_name) === false) {
		$errors[] = "We cannot find that theater_name";
	} else {
		$login = login($theater_name, $password);
		if ($login === false) {
			$errors[] = 'That theater_name and password combinations was not found';
		}else{
			$_SESSION['user_id'] = $login;
			header('Location: index.php');
			exit();
		}
	}

	echo output_errors($errors);
	header('Location: index.php');
}

include 'includes/overall/footer.php'
?>