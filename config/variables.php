<?php
# Global Variables Setup

// Title:
$site_title = 'uMarket';

// Each school will have it's own email domain
$school_domain = "jhu.edu";

# fetch pageid values
# Currently used to set navbar highlighting in navigation.php
if(isset($_GET['page'])) {		# if the page value is set
	$pageid = $_GET['page']; 	# set pageid to the value
} else {
	$pageid = 1;
}

// Load current page
$page = load_page($dbc, $pageid);

// Fetch user data if logged in
if (isset($_SESSION['username'])) {
	$user = data_user($dbc, $_SESSION['username']);
}
?>