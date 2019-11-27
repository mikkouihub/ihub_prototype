<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

// if (isset($_POST['btn_save'])) {
  
// }

$companyTagline = trim(mysqli_real_escape_string($conn, $_POST['company_tagline']));
$companyEmail = trim(mysqli_real_escape_string($conn, $_POST['company_email']));
$companyContactNo = trim($_POST['company_contact_number']);
$companyAddress = trim(mysqli_real_escape_string($conn, $_POST['company_address']));
$companyInfo = trim(mysqli_real_escape_string($conn, $_POST['company_info']));
$companyOwnerInfo = trim(mysqli_real_escape_string($conn, $_POST['company_owner_info']));

$sql = "UPDATE `company` SET `company_email` = ?, `company_address` = ?, `company_contact_number` = ?, `company_info` = ?, `company_owner_info` = ?, `company_tagline` = ? WHERE `company`.`company_ID` = $companyID;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "ssssss", $companyEmail, $companyAddress, $companyContactNo, $companyInfo, $companyOwnerInfo, $companyTagline);
  mysqli_stmt_execute($stmt);
}