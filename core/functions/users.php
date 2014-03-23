<?php 
function register_user($register_data){
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	$fields = '`'.implode('`,`', array_keys($register_data)).'`';
	$data = '\''.implode('\',\'',$register_data).'\'';
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	$directory = "users/" . $register_data['theater_name'];
	mkdir($directory);	
}

function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1){
		unset($func_get_args[0]);

		$fields = '`' . implode('`,`', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));

		return $data;
	}
}

function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($theater_name) {
	$theater_name = sanitize($theater_name);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `theater_name` = '$theater_name'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_theater_name($theater_name){
	$theater_name = sanitize($theater_name);
	return mysql_result(mysql_query("SELECT (`user_id`) FROM `users` WHERE `theater_name` = '$theater_name'"), 0, 'user_id');
}

function login($theater_name, $password){
	$user_id = user_id_from_theater_name($theater_name); 

	$theater_name = sanitize($theater_name);
	$password = md5($password);

	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `theater_name` = '$theater_name' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}

?>