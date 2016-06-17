<?php
# Start Login Session:
session_start();
include 'config/setup.php';
// Redirect user to homepage if already logged in
if(isset($_SESSION['username'])) {
	if ($user['account_type'] == "engineer") {
		header('Location: engineer.php?page=9');
	} elseif ($user['account_type'] == "master") {
		header('Location: master.php?page=9');
	}	
} else header('Location: index.php');
