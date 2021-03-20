<?php
// Start Session
session_start();
$_SESSION['errors'] = [];
// Reads the submitted file input.
$file = $_FILES['file'];
$fileInfoExtention = pathinfo($file['name'], PATHINFO_EXTENSION);  

// Validates input (checks that no errors & extension is .json).
if($file['error']) {
    $_SESSION['errors']['fail'] = $file['error'];
}

if($fileInfoExtention != 'json') {
    $_SESSION['errors']['invalid_extention'] = "please upload .json file";
}

// Reads data from the file then converts it from JSON to associative array then stores it in session and redirect to display.php
$fileRead = fopen($file['tmp_name'], "r");
$string = ""; 
//Output lines until EOF is reached
while (!feof($fileRead)){
  $line = fgets($fileRead);
  $string .= $line;
}

$_SESSION['json'] = json_decode($string);

fclose($fileRead);
// Moves the file to the project directory.
move_uploaded_file($file['tmp_name'], __DIR__. "/upload/" . uniqid() . ".$fileInfoExtention");
// redirect to display.php
header('Location: display.php');
