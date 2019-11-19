<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

if (isset($_POST['testimonial_id'])) {
  $sql = "UPDATE `company_testimonial` SET `testimonial_name` = ?, `testimonial_description` = ? WHERE `company_testimonial`.`testimonial_ID` = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "sss", $_POST['testimonial_name'], $_POST['testimonial_description'], $_POST['testimonial_id']);
    mysqli_stmt_execute($stmt);
  }
}