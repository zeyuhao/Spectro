<?php
# Variables Setup

// Each school will have it's own email domain
$school_domain = "jhu.edu";

// Fetch user data if logged in
if (isset($_SESSION['username'])) {
	$user = data_user($dbc, $_SESSION['username']);
}
?>