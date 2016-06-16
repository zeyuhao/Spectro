<?php
session_start();	
include 'config/setup.php';
$pageid = 2;
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
					<?php	
						$q = "SELECT * FROM item_listings";
						$r = mysqli_query($dbc, $q);
						while($listing = mysqli_fetch_assoc($r)) { 
							$listing_name = $listing['name'];
							$listing_desc = $listing['description'];
							$listing_price = $listing['price'];
							$image_path = $listing['thumbnail_path']; ?>
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="thumbnail" src="<?php echo $image_path; ?>">
						  			</a>
						 		</div>
								<div class="col-md-7">
								 	<h2><?php echo $listing_name; ?></h2>
								    <p><?php echo $listing_desc; ?></p>
								    <p><?php echo "$".$listing_price; ?></p>
								</div>
								<div class="col-md-1 col-md-offset-1">
									<div class="div-listings-btn">
										<div class="row">
											<button class="btn btn-default general-btn">Buy</button>														
										</div>
									</div><!-- END div-listings-btn -->										
								</div><!-- END col-md-3 -->
							</div><!-- END row -->
							<hr><!-- Horizontal line between listings -->
					<?php } ?>	
				</div><!-- End panel-body -->
			</div><!-- End panel -->
		</div><!-- end container -->
		<?php include 'template/footer.php'; ?> <!-- Footer is here -->
	</body>
</html>