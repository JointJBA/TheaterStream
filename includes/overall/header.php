<!doctype html>
<html>
<?php include 'includes/head.php'; ?>

    <?php 
    if (logged_in()){
    	include 'includes/logged_in_header.php';
    } else {
    	include 'includes/not_logged_in_header.php';
    }
?>
<body>