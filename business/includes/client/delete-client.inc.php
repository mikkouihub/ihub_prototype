<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

if (isset($_POST['client_id'])) {
  $fileLocation = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'clients' . DIRECTORY_SEPARATOR . $_POST['client_image'];

  if (unlink($fileLocation)) {
    $sql = "DELETE FROM `company_client` WHERE `company_client`.`client_ID` = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_bind_param($stmt, "s", $_POST['client_id']);
      mysqli_stmt_execute($stmt);
    }
  }
}