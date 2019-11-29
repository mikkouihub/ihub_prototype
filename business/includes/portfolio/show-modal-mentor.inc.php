<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$mentorID = $_SESSION['userID'];
$url = $_SESSION['mentor_url'];

$sql = "SELECT * FROM `portfolio` WHERE portfolio_ID = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "s", $_POST['portfolio_id']);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $output['portfolio_name'] = $row["portfolio_name"];
    $output['portfolio_desc'] = $row["portfolio_desc"];
  }

  echo json_encode($output);
}