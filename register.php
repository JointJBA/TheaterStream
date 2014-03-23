<?php 
include 'core/init.php';
include 'includes/overall/header.php'; 

if (empty($_POST)===false) {
	$required_fields = array('theater_name','password','repeat_password','first_name','email');
	foreach ($_POST as $key => $value) {
		if(empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	if(empty($errors)){
		if (user_exists($_POST['theater_name'])) {
			$errors[] = 'Sorry, the theater_name \''. $_POST['theater_name'] . '\' is already taken';
		}
		if (preg_match("/\\s/", $_POST['theater_name'])) {
			$errors[] = "Your theater_name must not take any spaces";
			
		}
		if ($_POST['password'] !== $_POST['repeat_password']) {
			$errors[] ='Your passwords do not match';
		}

	}

}
?>

      <?php
      if (isset($_GET['success']) && empty($_GET[''])) {
      	echo "You've been registered successfully";
        header('Location: index.php');

      }else{

	      if (empty($_POST) === false && empty($errors)) {
	      	$register_data = array(
	      			'theater_name' 	=> 	$_POST['theater_name'],
	      			'password' 	=> 	$_POST['password']	      			
	      		);

	      	register_user($register_data);
	      	header('Location: register.php?success');
	      	exit();

	      } else if(empty($errors) === false) {
	      	echo output_errors($errors);
	      }

      



      ?>


      <div class="row">
      <div class="large-4 large-centered columns">
        <div class="register panel text-center radius">
          <h2>Register</h2>
          <br>
          <form action="" method="post">
            <div class="large-10 large-centered columns">
              <div class="row">
                <div class="large-3 columns">
                  <label class="left inline" for=
                    "username">Theatername:</label>
                </div>
                <div class="large-9 columns">
                  <input type="text" name="theater_name">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="large-3 columns">
                  <label class="left inline" for=
                    "username">Password:</label>
                </div>
                <div class="large-9 columns">
                  <input type="password" name="password">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="large-3 columns">
                  <label class="left inline" for=
                    "username">Password:</label>
                </div>
                <div class="large-9 columns">
                  <input type="password" name="repeat_password">
                </div>
              </div>
            </div>
            <input class="button radius" type="submit" value=
              "Register">
          </form>
        </div>
      </div>

<?php
}
 include 'includes/overall/footer.php'; ?>