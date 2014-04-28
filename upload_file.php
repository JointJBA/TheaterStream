<?php
include 'core/init.php';
$files = glob("users/". $user_data['theater_name'] . "/*");
delete_contents($files);

mysql_query("UPDATE `users` SET `video_link`='' WHERE `theater_name`= '$theater_name'" );
$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");

$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 2000000000000)
&& in_array($extension, $allowedExts))

  {

  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("users/" . $user_data['theater_name'] ."/".$_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {

      move_uploaded_file($_FILES["file"]["tmp_name"],
      "users/". $user_data['theater_name'] . "/" . $_FILES["file"]["name"]);
      echo "Stored in: users/".$user_data['theater_name'] . "/" . $_FILES["file"]["name"];
      }
    }
    $theater_name=$user_data['theater_name'];
    $query = "users/".$user_data['theater_name'] . "/" . $_FILES["file"]["name"];
    mysql_query("UPDATE `users` SET `video_path`='$query' WHERE `theater_name`= '$theater_name'" );
        mysql_query("UPDATE `users` SET `video_link`='' WHERE `theater_name`= '$theater_name'" );
    mysql_query("UPDATE `users` SET `video_type`='0' WHERE `theater_name`= '$theater_name'" );
    //header('Location: control_panel.php?success=true');
  }
else
  {
  echo "Invalid file";
  }
?>