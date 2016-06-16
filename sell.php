<?php
# If user is not logged in, automatically go to login page.
# Start the session:
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: login.php?page=3');
}
include 'config/setup.php';
$pageid = 6;
if($_POST) {
	$data = upload_thumbnail($error_arr);
	if($data['success']) {
		$name = mysqli_real_escape_string($dbc, $_POST['name']);
		$price = $_POST['price'];
		$category = $_POST['category'];
		$condition = $_POST['condition'];
		$description = mysqli_real_escape_string($dbc, $_POST['description']);
		$thumbnail = mysqli_real_escape_string($dbc, $data['path']);
		$owner = $user['email'];
		$q = "INSERT INTO item_listings (name, price, category, cond, date, description, thumbnail_path, owner_email) 
			  VALUES ('$name', '$price', '$category', '$condition', CURDATE(), '$description', '$thumbnail', '$owner')";
		$r = mysqli_query($dbc, $q);
		if($r) {
			$message = $success_arr['create_listing_success'];
		} else {
			$message = "<p>$error_arr[create_listing_error]<p>$q</p>";
		}
	} else $message = $data['message'];	
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
					<div class="col-md-offset-2 tmp-msg-5">
						<?php if(isset($message)) { echo $message; } ?>
					</div>
					<form action="sell.php" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
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
							<label for="category" class="col-sm-2 control-label">Category</label>
						    <div class="col-sm-6">
						    	<select class="form-control" type="text" name="category" id="category" required="yes">
									<option value = "battle-scarred">Electronics</option>
									<option value = "well-worn">Furniture</option>
									<option value = "field-tested">Clothing</option>
									<option value = "minimal-wear">Cosmetics</option>
									<option value = "Factory-New">Books</option>
									<option value = "Factory-New">Tickets</option>
									<option value = "Factory-New">Miscellaneous</option>
								</select>
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
						    	<input type="file" id="photos" name="photos">
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
		</div><!-- End container -->
		<?php include 'template/footer.php'; ?> <!-- Footer is here -->
	</body>
</html>
