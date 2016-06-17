<?php
# If user is not logged in, automatically go to login page.
# Start the session:
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}
include 'config/setup.php';
$pageid = 9;
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'template/default_head.php'; ?>
  </head>
  <body>
	<?php include 'template/side.php'; ?>
	<?php include 'template/navigation.php'; ?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-2 col-md-3">

<strong> What went well?</strong>
<br>
<div class="panel panel-default">
  <div class="panel-body">
    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8e/Pan_Blue_Circle.png" height="42" width="42">
    <strong>June 16, 2016</strong>
    <br></br>
    <p>A retro item</p>
    <em>anonymous</em>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Ski_trail_rating_symbol-green_circle.svg" height="42" width="42">
    <strong>June 17, 2016</strong>
    <br></br>
    <p>A retro item</p>
    <em>anonymous</em>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Ski_trail_rating_symbol-green_circle.svg" height="42" width="42">
    <strong>June 16, 2016</strong>
    <br></br>
    <p>a realllllllllllllllllllllyyyyyyyy lonnnnnnnnnnnnnnngggggggggggggg retro item. a little too much detail. this is a specific item with a lot of text that few people will relate to. it will probably not be actionable.</p>
    <em>anonymous</em>
  </div>
</div>








        </div><!-- End col-md-3 -->



        <div class="col-md-3">
          <strong>What needs improvment?</strong>
          <br>

          <div class="panel panel-default">
            <div class="panel-body">
              <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Ski_trail_rating_symbol-green_circle.svg" height="42" width="42">
              <strong>June 16, 2016</strong>
              <br></br>
              <p>a realllllllllllllllllllllyyyyyyyy lonnnnnnnnnnnnnnngggggggggggggg retro item. a little too much detail. this is a specific item with a lot of text that few people will relate to. it will probably not be actionable.</p>
              <em>anonymous</em>
            </div>

            <div class="panel-body">
              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/fb/Yellow_icon.svg/1024px-Yellow_icon.svg.png" height="42" width="42">
              <strong>June 16, 2016</strong>
              <br></br>
              <p>A retro item</p>
              <em>anonymous</em>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">
              <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Ski_trail_rating_symbol-green_circle.svg" height="42" width="42">
              <strong>June 17, 2016</strong>
              <br></br>
              <p>A retro item</p>
              <em>anonymous</em>
            </div>
          </div>


          <div class="panel panel-default">
            <div class="panel-body">
              <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Ski_trail_rating_symbol-green_circle.svg" height="42" width="42">
              <strong>June 17, 2016</strong>
              <br></br>
              <p>A retro item</p>
              <em>anonymous</em>
            </div>
          </div>

        </div><!-- End col-md-3 -->




        <!--ACTION ITEMS-->
        <div class="col-md-3">
          <strong>Action Items:</strong>
          <br>

        <div class="panel panel-default">
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Ski_trail_rating_symbol-green_circle.svg" height="42" width="42">Do everything better
          <br>
          <em>team</em>

          <br>
          <br>

          <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/fb/Yellow_icon.svg/1024px-Yellow_icon.svg.png" height="42" width="42">Do everything better
          <br>
          <em>team</em>

        </div><!-- End col-md-3 -->

      </div><!-- End row -->
    </div><!-- End container-fluid -->

    <?php include 'template/footer.php'; ?> <!-- Footer -->
  </body>
</html>
