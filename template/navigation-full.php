<nav class="navbar navbar-default navbar-fixed-top" role="navigation"><!-- START MAIN NAVIGATION -->
	<div class="container-fluid">
		<ul class="nav navbar-nav pull-right">
			<!-- Navbar highlighting is done here -->
			<li <?php if($pageid == '9') { echo ' class="active"'; } ?> ><a href="retro_gateway.php">Retro</a></li>
			<li <?php if($pageid == '5') { echo ' class="active"'; } ?> ><a href="account-settings.php">Account</a></li>
			<li><a href="logout.php">Sign Out</a></li>
		</ul><!-- END navbar-nav pull-right -->
		<ul class="nav navbar-nav pull-left">
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
			<li class="navbar-text">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				Welcome, <?php echo $user['fullname']." "; ?>
			</li>
			<?php } ?>
		</ul><!-- navbar-nav pull-left -->
	</div><!-- END container-fluid -->
</nav><!-- END MAIN NAVIGATION -->
