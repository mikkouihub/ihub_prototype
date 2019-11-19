<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

echo '<option value="">Select Business Type</option>';

$sql = "SELECT `company_business_type` FROM `company` WHERE company_ID = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "s", $companyID);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  $business_type = $row['company_business_type'];

  if ($business_type == 3) {
    $sql = "SELECT * FROM company_businesstype WHERE businesstype_id != 3";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['businesstype_id'] . '">' . $row['businesstype_name'] . '</option>';
      }
    }
  } elseif ($business_type == 1 || $business_type == 2) {
    $sql = "SELECT * FROM company_businesstype WHERE businesstype_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_bind_param($stmt, "s", $business_type);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['businesstype_id'] . '">' . $row['businesstype_name'] . '</option>';
      }
    }
  }
}