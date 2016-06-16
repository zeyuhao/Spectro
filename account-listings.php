<?php
# If user is not logged in, automatically go to login page.
# Start the session:
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}
include 'config/setup.php';
$pageid = 7;

if(isset($_POST['delete'])) {
	$q = "DELETE FROM item_listings WHERE id = '$_POST[listing_id]'";
	$r = mysqli_query($dbc, $q);
	if($r && unlink($_POST['listing_path'])) {
		$message = $success_arr['delete_listing_success'];	
	} else {
		$message = $error_arr['delete_listing_error'];
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
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php include 'template/page_header.php'; ?>
					<div class="tmp-msg-3">
						<?php if(isset($message)) { echo $message; } ?>
					</div>
					<?php
						$email = $user['email'];
						$q = "SELECT * FROM item_listings WHERE owner_email = '$email'";
						$r = mysqli_query($dbc, $q);
						// If user has listings, then list them
						if(mysqli_num_rows($r) > 0) { ?>
						<?php 
							while($listing = mysqli_fetch_assoc($r)) {
								$listing_id = $listing['id'];
								$listing_name = $listing['name'];
								$listing_desc = $listing['description'];
								$listing_price = $listing['price'];
								$image_path = $listing['thumbnail_path']; ?>
								<div class="row">
									<div class="col-md-3">
										<a href="#">
											<img class="thumbnail" src="<?php echo $image_path; ?>">
							  			</a>
							 		</div><!-- END col-md-3 -->
									<div class="col-md-7">
									 	<h2><?php echo $listing_name; ?></h2>
									    <p><?php echo $listing_desc; ?></p>
									    <p><?php echo "$".$listing_price; ?></p>
									</div><!-- END col-md-7 -->
									<div class="col-md-1 col-md-offset-1">
										<div class="div-listings-btn">
											<form action="account-listings.php" method="post" role="form">
												<div class="row">
													<button class="btn btn-default general-btn" 
														name="edit">Edit</button>														
												</div>
												<div class="row">
													<button type="submit" class="btn btn-default general-btn" 
														name="delete">Delete</button>
													<input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
													<input type="hidden" name="listing_path" value="<?php echo $image_path; ?>"> 
												</div>
											</form><!-- END form -->
										</div><!-- END div-listings-btn" -->										
									</div><!-- END col-md-1 col-md-offset-1 -->
								</div><!-- END row -->
								<hr><!-- Horizontal line between listings -->
						<?php } ?>
					<?php } else { ?>
							<p>You currently have no posted listings</p>
							<button onclick="location.href='sell.php?page=6';" class="btn btn-primary">Create a listing</button>
					<?php } ?>
				</div><!-- End panel-body -->
			</div><!-- End panel -->
		</div><!-- end container -->
		<?php include 'template/footer.php'; ?> <!-- Footer is here -->
	</body>
</html>