<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$mentorID = $_SESSION['userID'];
$url = $_SESSION['mentor_url'];

if (isset($_POST['portfolio_id'])) {
  $fileLocation = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'portfolio' . DIRECTORY_SEPARATOR . $_POST['portfolio_image'];

  if (unlink($fileLocation)) {
    $sql = "DELETE FROM `portfolio` WHERE `portfolio`.`portfolio_ID` = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_bind_param($stmt, "s", $_POST['portfolio_id']);
      mysqli_stmt_execute($stmt);
    }
  }
}