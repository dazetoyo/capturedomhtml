<?php



// Get the incoming image data
$image = $_POST["image"];

// Remove image/jpeg from left side of image data
// and get the remaining part
$image = explode(";", $image)[1];

// Remove base64 from left side of image data
// and get the remaining part
$image = explode(",", $image)[1];

// Replace all spaces with plus sign (helpful for larger images)
$image = str_replace(" ", "+", $image);

// Convert back from base64
$image = base64_decode($image);
$name = time();


file_put_contents("Certificate" . $name . ".jpeg", $image);

$url = 'Certificate' . $name . '.jpeg';


echo '<a id="downloadimg" href="download.php?img='.$url.'">Download</a>';




//
// unlink("Certificate" . $name . ".jpeg");

 //
 // gotoURL("https://wp-test.sitelab.io/brasscheck/download.php?img='.$url.'");



// Save the image as filename.jpeg
// file_put_contents("generated-images/certificate.jpeg", $image);

// Sending response back to client
