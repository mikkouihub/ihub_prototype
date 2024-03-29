<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['company_url'];

function if_file_exists($file_name, $conn) {
  $sql = "SELECT * FROM company_document WHERE document_name = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "s", $file_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);

    if ($resultCheck > 0) {
      return true;
    } else {
      return false;
    }
  }
}

if (count($_FILES["document-files"]["name"]) > 0) {
  sleep(3);

  for ($count = 0; $count < count($_FILES["document-files"]["name"]); $count++) { 
    $file_name = $_FILES["document-files"]["name"][$count];
    $tmp_name = $_FILES["document-files"]['tmp_name'][$count];
    $file_array = explode(".", $file_name);
    $file_extension = end($file_array);

    if (if_file_exists($file_name, $conn)) {
      $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
    }

    $fileLocation = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $file_name;

    if (move_uploaded_file($tmp_name, $fileLocation)) {
      $sql = "INSERT INTO `company_document` (`document_ID`, `document_name`, `document_description`, `document_category`, `is_deleted`, `company_ID`) VALUES (NULL, ?, NULL, NULL, '0', $companyID);";
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