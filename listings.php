<?php
session_start();	
include 'config/setup.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'template/default_head.php'; ?>
	</head>	
	<body>
		<?php include 'template/navigation.php'; ?><!--Navigation here -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading"><h3><?php echo $page['header']; ?></h3></div><!-- END Panel Heading -->
						<div class="panel-body">
							<div class="list-group">
								<?php	
								$q = "SELECT * FROM item_listings";
								$r = mysqli_query($dbc, $q);
								while($listing = mysqli_fetch_assoc($r)) { 
									$listing_name = $listing['name'];
									$listing_desc = $listing['description'];
									$listing_price = $listing['price'];
									$image_path = $listing['picture_path']; ?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-3">
												<a href="#">
													<img class="img-rounded" src="<?php echo $image_path; ?>">
									  			</a>
									 		</div>
											<div class="col-md-7">
											 	<h2><?php echo $listing_name; ?></h2>
											    <p><?php echo $listing_desc; ?></p>
											    <p><?php echo "$".$listing_price; ?></p>
											</div>
											<div class="col-md-2">
												<button class="btn btn-default pull-right" id="listings-btn-buy">Buy</button>
											</div>
										</div>
						  			</li>
								<?php } 
								?>	
							</div><!-- End list-group -->
						</div><!-- End panel-body -->
					</div><!-- End panel -->
				</div><!-- End col-md-10 col-md-offset-1 -->	
			</div><!-- end row -->
		</div><!-- end container-fluid -->
		<?php include 'template/footer.php'; ?> <!-- Footer is here -->
	</body>
</html>