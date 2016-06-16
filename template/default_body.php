<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php include 'template/navigation.php'; ?><!--Navigation here -->
			<div class="panel panel-default">
				 <div class="panel-body">
					<h1><?php echo $page['header']; ?></h1>
					<?php if (isset($page['body_formatted'])) { echo $page['body_formatted']; } ?>
				</div><!-- End panel-body -->
			</div><!-- End panel -->
		</div><!-- End col-md-10 col-md-offset-1 -->
	</div><!-- end row -->
</div><!-- end container-fluid -->