<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

function old_document_name($document_id, $conn) {
  $sql = "SELECT * FROM `company_document` WHERE document_ID = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "s", $_POST['document_id']);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      return $row["document_name"];
    }
  }
}

if (isset($_POST['document_id'])) {
  $old_document_name = old_document_name($_POST['document_id'], $conn);
  $document_array = explode(".", $old_document_name);
  $document_extension = end($document_array);

  $new_document_name = $_POST['document_name'] . '.' . $document_extension;

  if ($old_document_name != $new_document_name) {
    $old_path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $old_document_name;
    $new_path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $new_document_name;

    if (rename($old_path, $new_path)) {
      $sql = "UPDATE `company_document` SET `document_name` = ?, `document_description` = ?, `document_category` = ? WHERE `company_document`.`document_ID` = ?;";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('SQL Failed: ' . mysqli_error($conn));
      } else {
        mysqli_stmt_bind_param($stmt, "ssss", $new_document_name, $_POST['document_description'], $_POST['document_category'], $_POST['document_id']);
        mysqli_stmt_execute($stmt);
      }
    }
  } else {
    $sql = "UPDATE `company_document` SET `document_description` = ?, `document_category` = ? WHERE `company_document`.`document_ID` = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_bind_param($stmt, "sss", $_POST['document_description'], $_POST['document_category'], $_POST['document_id']);
      mysqli_stmt_execute($stmt);
    }
  }
}