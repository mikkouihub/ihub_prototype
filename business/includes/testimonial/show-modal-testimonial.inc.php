<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$sql = "SELECT * FROM `company_testimonial` WHERE testimonial_ID = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "s", $_POST['testimonial_id']);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $output['testimonial_name'] = $row["testimonial_name"];
    $output['testimonial_description'] = $row["testimonial_description"];
  }

  echo json_encode($output);
}