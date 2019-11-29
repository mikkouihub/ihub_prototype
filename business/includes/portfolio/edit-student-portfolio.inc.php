<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$studentID = $_SESSION['userID'];

if (isset($_POST['portfolio_id'])) {
  $sql = "UPDATE `portfolio` SET `portfolio_name` = ?, `portfolio_desc` = ? WHERE `portfolio`.`portfolio_ID` = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "sss", $_POST["portfolio_name"], $_POST["portfolio_desc"], $_POST["portfolio_id"]);
    mysqli_stmt_execute($stmt);
  }
}