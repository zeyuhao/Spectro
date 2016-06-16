<?php 
session_start();
if (isset($_SESSION['account_created'])) {
	header('Location: index.php');
}
include 'config/setup.php';
$pageid = 8;
// If user submits form
if (isset($_POST['submitted_master']) == 1) {
	$type = "master";
	$q = "UPDATE users SET account_type='$type' WHERE email='$user[email]'";
	$r = mysqli_query($dbc, $q);
	if ($r) {
		$_SESSION['account_created'] = true;
		header('Location: engineer.php');
	} else $message = '<p>Your account could not be added because: '.mysqli_error($dbc).'</p>';
} else if (isset($_POST['submitted_engineer?page=9']) == 1) {
	$type = "engineer";
	$q = "UPDATE users SET account_type='$type' WHERE email='$user[email]'";
	$r = mysqli_query($dbc, $q);
	if ($r) {
		$_SESSION['account_created'] = true;
		header('Location: engineer.php.php?page=9');
	} else {
		$q = "DELETE from users WHERE email='$user[email]'";
		$r = mysqli_query($dbc, $q);
		$message = '<p>Your account could not be added because: '.mysqli_error($dbc).'</p>';
	}
}		
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'template/default_head.php'; ?>
	</head>	
	<body>
		<?php include 'template/navigation.php'; ?><!--Navigation here -->
		<!-- Page form created here -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-heading"><h3>I am a ...</h3></div><!-- END Panel Heading -->
						<div class ="panel-body">
							<div class="row">
								<div class="col-md-2 col-md-offset-1">
									<form action="" method="post" role="form">
										<button type="submit" class="btn btn-default">Scrum Master</button>
										<input type="hidden" name="submitted_master" value="1">
									</form><!-- End Scrum Master form -->
								</div><!-- End Scrum Master div -->
								<div class="col-md-2 col-md-offset-5">
									<form action="" method="post" role="form">
										<button type="submit" class="btn btn-default">Engineer User</button>
										<input type="hidden" name="submitted_engineer" value="1">
									</form><!-- End Scrum Master form -->
								</div><!-- End Scrum Master div -->
							</div><!-- End Button row -->
						</div><!-- End panel-body -->
					</div><!-- End panel -->
				</div><!-- End col-md-6 col-md-offset-3 -->
			</div><!-- End row -->
		</div><!-- End container-fluid -->
		<?php include 'template/footer.php'; ?> <!-- Footer is here -->
	</body>
</html>