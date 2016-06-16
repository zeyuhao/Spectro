<?php
// This functions checks if emails belong to a specific domain e.g jhu.edu
function validate_email_format($email, $expected) {
	// Make sure the address is valid
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// Takes domain part of email after '@'
		$domain = array_pop(explode('@', $email));
		// if domain matches expected
		if ($domain == $expected) {
			return TRUE;
	    } else return FALSE;
	} else return FALSE;
}

// This function checks that the email doesn't already exist in database
function validate_email_unique($email, $dbc) {
	$q = "SELECT * from users WHERE email = '$email'";
	$r = mysqli_query($dbc, $q);
	if (mysqli_num_rows($r) == 1) {
		return FALSE;
	} else return TRUE;
}

/* 	This function checks if phone numbers are valid, and if so
 *  returns a yyy-yyy-yyyy format number.
 * 
 *  The following formats are allowed:
 *  555 555 5555
 *  (555) 555-5555
 *  (555)555-5555
 *  555-555-5555
 *  555.555.5555
 *  5555555555
 *  0-000-000-0000
 *  0.000.000.0000
 *  0 000 000 0000
 *  00000000000
 *  +0-000-000-0000
 *  +0.000.000.0000
 *  +0 000 000 0000
 *  +00000000000
 */
function validate_phone_format($phone) {
    if (preg_match('/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/',$phone, $number)) {
    	$number = $number[2] . '-' . $number[3] . '-' . $number[4];
		return $number;
    } else return FALSE;
}

function validate_image_upload () {
	if (!isset($_FILES['photos']['error']) || is_array($_FILES['photos']['error'])) {
		throw new RuntimeException('Invalid parameters.');
	}
	switch ($_FILES['photos']['error']) {
	    case UPLOAD_ERR_OK:
	        break;
	    case UPLOAD_ERR_NO_FILE:
	        throw new RuntimeException('No file sent.');
	    case UPLOAD_ERR_INI_SIZE:
	    case UPLOAD_ERR_FORM_SIZE:
	        throw new RuntimeException('Exceeded filesize limit.');
	    default:
	        throw new RuntimeException('Unknown errors.');
	}
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["photos"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["photos"]["tmp_name"]);
	if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	} else {
	    echo "File is not an image.";
	    $uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["photos"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["photos"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["photos"]["name"]). " has been uploaded.";
			return $target_file;
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
?>