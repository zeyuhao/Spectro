<?php
// Setup File

# Database Connection
include 'config/connection.php';

# Constants:
//DEFINE('D_TEMPLATE', 'template');

# Includes the following:
# functions/data.php;
# functions/template.php;
# functions/text.php;
# functions/validation.php;
foreach (glob("functions/*.php") as $filename)
{
    include $filename;
}

# Variables
include 'config/variables.php';

# Page Title:
$site_title = 'uMarket';

# fetch pageid values
# Currently used to set navbar highlighting in navigation.php
if(isset($_GET['page'])) {		# if the page value is set
	$pageid = $_GET['page']; 	# set pageid to the value
} else {
	$pageid = 1;
}

// Load current page
$page = load_page($dbc, $pageid);
?>