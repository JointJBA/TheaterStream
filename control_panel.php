<?php 
include 'core/init.php';
include 'includes/overall/header.php';


if (logged_in() && empty($_POST) === false) {
	if (empty($_POST['link']) === false) {
		$link=$_POST['link'];
		$theater_name = $user_data['theater_name'];
		mysql_query("UPDATE `users` SET `video_link`='$link' WHERE `theater_name`= '$theater_name'" );
    mysql_query("UPDATE `users` SET `video_type`='1' WHERE `theater_name`= '$theater_name'" );
		mysql_query("UPDATE `users` SET `video_path`='' WHERE `theater_name`= '$theater_name'" );

    $success=true;

	}}

  if ($_GET['success']=='true' || $success) {
  echo "<script> alert('Successfully updated!'); </script>";
}
if (logged_in()){

  


?> 
<div class="row"> <div class="large-5 large-centered columns">
  <div class="register panel text-center radius">
    <div class="row">

      <div class="large-12 large-centered columns">

        <h2>Control Panel</h2>
        <br>
        
          <div class="large-10 large-centered columns">
            <div class="row">
              <div class="large-3 columns">
                <form action="upload_file.php" method="post" enctype="multipart/form-data">
                  <label class="left inline" for=
                  "username">Video Upload:</label>
                </div>
                <div class="large-6 columns">
                  <input type="file" name="file" id="file" /> 
                </div>
                <div class="large-3 columns">
                  <input class="button radius tiny" type="submit" name="submit" value="save">
                </div>
              </form>
            </div>
            <br>
            <div class="row">
              <div class="large-3 columns">
                <form action="" method="post" >
                  <label class="left inline" for=
                  "username">Youtube Video ID:</label>
                </div>
                <div class="large-6 columns">
                  <input type="text" name="link">
                </div>
                <div class="large-3 columns">
                  <input class="button radius tiny" type="submit" value="save">
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
}else{
	header('Location:index.php');
}


include 'includes/overall/footer.php';
?>