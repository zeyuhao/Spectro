<?php
# If user is not logged in, automatically go to login page.
# Start the session:
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}
include 'config/setup.php';
if($_POST) {
	$target_file = validate_image_upload();
	if($target_file) {
		$name = mysqli_real_escape_string($dbc, $_POST['name']);
		$price = $_POST['price'];
		$condition = $_POST['condition'];
		$description = mysqli_real_escape_string($dbc, $_POST['description']);
		$photo = mysqli_real_escape_string($dbc, $target_file);
		$q = "INSERT INTO item_listings (name, price, cond, date, description, picture_path) 
			  VALUES ('$name', '$price', '$condition', CURDATE(), '$description', '$photo')";
		$r = mysqli_query($dbc, $q);
		if ($r) {
			$message = "<p>Listing was successfully created!</p>";
		} else {
			$message = "<p>Listing couldn't be created because: '.mysqli_error($dbc).'</p>";
			$message .= '<p>'.$q.'</p>';
		}
	} else $message = "Photo was not uploaded successfully";	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'template/default_head.php'; ?>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<?php include 'template/navigation.php'; ?><!--Navigation here -->
					<div class="panel panel-default">
						<div class="panel-heading"><h3><?php echo $page['header']; ?></h3></div><!-- END Panel Heading -->
						<div class="panel-body">
							<div class="col-md-offset-2 tmp-msg">
								<?php if (isset($message)) { echo $message; } ?>
							</div>
							<form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Name</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="name" name="name"
								    		placeholder="Your listing's Name" required="yes">
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Price</label>
								    <div class="col-sm-6">									
									    <div class="input-group">
									    	<div class="input-group-addon">$</div>
									      	<input type="text" class="form-control" id="price" name="price" 
									    		placeholder="Listing Price" required="yes">
									    </div>
									</div>	
								</div>
								<div class="form-group">
									<label for="condition" class="col-sm-2 control-label">Condition</label>
								    <div class="col-sm-6">
								    	<select class="form-control" type="text" name="condition" id="condition" required="yes">
											<option value = "battle-scarred">Battle-Scarred</option>
											<option value = "well-worn">Well-Worn</option>
											<option value = "field-tested">Field-Tested</option>
											<option value = "minimal-wear">Minimal-Wear</option>
											<option value = "Factory-New">Factory-New</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="description" class="col-sm-2 control-label">Description</label>
								    <div class="col-sm-6">
								    	<textarea class="form-control" id="description" name="description" 
								    		required="yes" placeholder="Describe your listing" rows="8"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="photos" class="col-sm-2 control-label">Photos</label>
								    <div class="col-sm-6">
								    	<input type="file" id="photos" name="photos" required="yes">
   			 							<p class="help-block">Upload photos of your listing</p>
									</div>
								</div>
								<div class="col-sm-offset-2">
									<button type="submit" class="btn btn-default">List it</button>
									<button type="reset" class="btn btn-default">Clear</button>
								</div>
							</form><!-- END Form -->
						</div><!-- End panel-body -->
					</div><!-- End Panel -->
				</div><!-- End col-md-10 col-md-offset-1 -->
			</div><!-- End row -->
		</div><!-- End container-fluid -->
		<?php include 'template/footer.php'; ?> <!-- Footer is here -->
	</body>
</html>
