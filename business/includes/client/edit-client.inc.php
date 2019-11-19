<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

if (isset($_POST['client_id'])) {
  $sql = "UPDATE `company_client` SET `client_name` = ? WHERE `company_client`.`client_ID` = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "ss", $_POST['client_name'], $_POST['client_id']);
    mysqli_stmt_execute($stmt);
  }
}