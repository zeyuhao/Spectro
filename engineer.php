<?php
session_start();	
include 'config/setup.php';
$pageid = 9;
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'template/default_head.php'; ?>
	</head>	
	<body>
		<?php include 'template/navigation.php'; ?><!--Navigation here -->
		<div class="container">
			<div id="engineer-btns">
				<button type="submit" class="btn btn-default" id="btn-engineer-went-well">What Went Well</button>
				<button type="reset" class="btn btn-default" id="btn-engineer-needs-improvement">What Needs Improvement</button>
			</div>
			<br></br>
			<div class="panel panel-danger">
				<div class="panel-body">
					<form action="engineer.php" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
						<div class="form-group" id="form-engineer-went-well">
							<label for="description" class="col-sm-2 control-label">Description</label>
						    <div class="col-sm-6">
						    	<textarea class="form-control" id="went-well-description" name="description" 
						    		required="yes" placeholder="Describe some positive experiences" rows="8"></textarea>
							</div>
						</div><!-- END form-group -->
						<div class="form-group" id="form-engineer-needs-improvement">
							<label for="description" class="col-sm-2 control-label">Description</label>
						    <div class="col-sm-6">
						    	<textarea class="form-control" id="needs-improvment-description" name="description" 
						    		required="yes" placeholder="Describe what needs improvement" rows="8"></textarea>
							</div>
						</div><!-- END form-group -->
						<div class="form-group">
							<label for="condition" class="col-sm-2 control-label">Retro Theme</label>
						    <div class="col-sm-6">
						    	<select class="form-control" type="text" name="condition" id="condition" required="yes">
									<option value = "community-presence">Community Presence</option>
									<option value = "code-reviews">Code Reviews</option>
									<option value = "web-ui">Web UI</option>
									<option value = "prioritization">Prioritization</option>
									<option value = "deployments">Deployments</option>
									<option value = "refactoring">Refactoring</option>
									<option value = "api-docs">API Docs</option>
									<option value = "optimization">Optimization</option>
									<option value = "partnerships">Partnerships</option>
									<option value = "users-and-roles">Users and Roles</option>
									<option value = "backlog">Backlog</option>
									<option value = "meetings">Meetings</option>
									<option value = "lunch-and-learns">Lunch and Learns</option>
									<option value = "tech-debt">Tech Debt</option>
									<option value = "team-communication">Team Communication</option>
									<option value = "functional-tests">Functional Tests</option>
									<option value = "unit-tests">Unit Tests</option>
									<option value = "other">Other</option>
								</select>
							</div>
						</div><!-- END form-group -->
					</div>
				</div>
			</div>
		</div>
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