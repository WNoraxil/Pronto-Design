<?php

// Set the variables
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "test";

// Connection to the projct database.
$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

// Give error message if the connection failed.
if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 50000) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: ../index.php?upload=success");
      } else {
         echo "Your file is to big!";
       }
    } else {
       echo "There was an error uploading your file!";
     }
  } else {
     echo "You cannont upload files of this type!";
   }
} else {
  header ("Location: ../index.php");
}
?>
