<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$sql = "SELECT * FROM `company_document` WHERE document_ID = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "s", $_POST['document_id']);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $document_name = explode(".", $row['document_name']);
    $output['document_name'] = $document_name[0];
    // $output['document_name'] = $row["document_name"];
    $output['document_description'] = $row["document_description"];
    $output['document_category'] = $row["document_category"];
  }

  echo json_encode($output);
}