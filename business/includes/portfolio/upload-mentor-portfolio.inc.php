<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$mentorID = $_SESSION['userID'];
$url = $_SESSION['mentor_url'];

if (count($_FILES["product-service-files"]["name"]) > 0) {
  sleep(3);

  for ($count = 0; $count < count($_FILES["product-service-files"]["name"]); $count++) { 
    $file_name = $_FILES["product-service-files"]["name"][$count];
    $tmp_name = $_FILES["product-service-files"]['tmp_name'][$count];
    $file_array = explode(".", $file_name);
    $file_extension = end($file_array);

    $file_name = uniqid('', true) . "." . $file_extension;

    $fileLocation = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'portfolio' . DIRECTORY_SEPARATOR . $file_name;

    if (move_uploaded_file($tmp_name, $fileLocation)) {
      $sql = "INSERT INTO `portfolio` (`portfolio_ID`, `portfolio_image`, `portfolio_name`, `portfolio_desc`, `user_ID`) VALUES (NULL, ?, '', '', $mentorID);";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('SQL Failed: ' . mysqli_error($conn));
      } else {
        mysqli_stmt_bind_param($stmt, "s", $file_name);
        mysqli_stmt_execute($stmt);
      }
    }
  }
}