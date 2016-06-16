<?php
# JavasScript Setup:
?>

<!-- jQuery 2xx -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- JS for the debug console -->
<script>
	$(document).ready(function() {
		$("#console-debug").hide();	
		$("#btn-debug").click(function() {
			$("#console-debug").toggle();		
		});
	});
</script>

<!-- Function to hide displayed messages after x seconds --> 
<script>
	$(function() {
		setTimeout(function() { 
			$(".tmp-msg:visible").hide(600);
		}, 3000);
	});
</script>

<script>
	$(function() {
	    $("#form-account-name").hide();	
	    $("#form-account-email").hide();	
	    $("#form-account-password").hide();
	    $("#form-account-phone").hide();	
		
		$("#btn-account-name-edit").click(function() {
			$("#form-account-name").show(600);
			$("#form-account-email").hide(600);
			$("#form-account-phone").hide(600);
			$("#form-account-password").hide(600);
			$("#account-settings-name-data").hide(300);
			$("#account-settings-email-data").show(300);
			$("#account-settings-password-data").show(300);
			$("#account-settings-phone-data").show(300);
	    });
	    $("#btn-account-name-cancel").click(function() {
			$("#form-account-name").hide(600);
			$("#account-settings-name-data").show(600);
	    });
	    
	    $("#btn-account-email-edit").click(function() {
	    	$("#form-account-email").show(600);
			$("#form-account-name").hide(600);
			$("#form-account-phone").hide(600);
			$("#form-account-password").hide(600);
			$("#account-settings-name-data").show(300);
			$("#account-settings-email-data").hide(300);
			$("#account-settings-password-data").show(300);
			$("#account-settings-phone-data").show(300);
	    });
	    $("#btn-account-email-cancel").click(function() {
			$("#form-account-email").hide(600);
			$("#account-settings-email-data").show(600);
	    });
	    
	    $("#btn-account-phone-edit").click(function() {
			$("#form-account-phone").show(600);
			$("#form-account-name").hide(600);
			$("#form-account-email").hide(600);
			$("#form-account-password").hide(600);
			$("#account-settings-name-data").show(300);
			$("#account-settings-email-data").show(300);
			$("#account-settings-password-data").show(300);
			$("#account-settings-phone-data").hide(300);
	    });
	    $("#btn-account-phone-cancel").click(function() {
			$("#form-account-phone").hide(600);
			$("#account-settings-phone-data").show(600);
	    });
	    
	    $("#btn-account-password-edit").click(function() {
			$("#form-account-password").show(600);
			$("#form-account-name").hide(600);
			$("#form-account-email").hide(600);
			$("#form-account-phone").hide(600);
			$("#account-settings-name-data").show(300);
			$("#account-settings-email-data").show(300);
			$("#account-settings-password-data").hide(300);
			$("#account-settings-phone-data").show(300);
	    });
	    $("#btn-account-password-cancel").click(function() {
			$("#form-account-password").hide(600);
			$("#account-settings-password-data").show(600);
	    });
	});
</script>