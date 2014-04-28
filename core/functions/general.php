<?php
function sanitize($data) {
	return mysql_real_escape_string($data);
}

function output_errors($errors) {
	return '<ul><li>' . implode('</li></li>', $errors) . '</li></ul>';
}

function array_sanitize($item){
	$item = mysql_real_escape_string($item);
}
	
function delete_contents($files){

foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
}
?>