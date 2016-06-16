<nav class="navbar navbar-default navbar-fixed-top" role="navigation"><!-- START MAIN NAVIGATION -->
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<!-- Navbar highlighting is done here -->
			<li <?php if($pageid == '1') { echo ' class="active"'; } ?> ><a href='index.php'>Home</a></li>
			<li <?php if($pageid == '2') { echo ' class="active"'; } ?> ><a href='listings.php'>Listings</a></li>
			<li <?php if($pageid == '6') { echo ' class="active"'; } ?> ><a href='sell.php'>Sell</a></li>
		</ul>
		<div class="pull-right">
			<ul class="nav navbar-nav">
				<?php if (!isset($_SESSION['username'])) { ?>
				<li>
					<button onclick="location.href='login.php';" type="button" 
						class="btn btn-default navbar-btn general-btn">Sign In</button>
				</li>
				<li>
					<button onclick="location.href='signup.php';" type="submit" 
						class="btn btn-default navbar-btn general-btn">Sign Up</button>
				</li>
				<?php } else { ?>
				<button type="button" class="btn btn-default btn-sm navbar-btn dropdown-toggle" id="account-btn" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"> Welcome, <?php echo $user['fullname']." "; ?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="account-listings.php">Your Listings</a></li>
					<li><a href="account-settings.php">Your Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>	
				<?php } ?>
			</ul>
		</div>
	</div>
</nav><!-- END MAIN NAVIGATION -->