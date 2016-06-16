<?php

function rescale_image($src, $dst, $new_h, $new_w) {
	
	// Get image dimensions
	list($width, $height) = getimagesize($src);
	$ratio = $width/$height;
	if ($new_w/$new_h > $ratio) {
	   $new_w = $new_h * $ratio;
	} else {
	   $new_h = $new_w/$ratio;
	}
	
	// Resample
	$image_p = imagecreatetruecolor($new_w, $new_h);
	$image = imagecreatefromjpeg($src);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_w, $new_h, $width, $height);
	
	// Output
	imagejpeg($image_p, $dst, 100);
}
?>