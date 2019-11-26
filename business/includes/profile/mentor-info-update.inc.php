<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$mentorID = $_SESSION['mentorID'];

// if (isset($_POST['btn_save'])) {
  
// }

// $companyTagline = trim(mysqli_real_escape_string($conn, $_POST['company_tagline']));
// $companyEmail = trim(mysqli_real_escape_string($conn, $_POST['company_email']));
// $companyContactNo = trim($_POST['company_contact_number']);
// $companyAddress = trim(mysqli_real_escape_string($conn, $_POST['company_address']));
// $companyInfo = trim(mysqli_real_escape_string($conn, $_POST['company_info']));
// $companyOwnerInfo = trim(mysqli_real_escape_string($conn, $_POST['company_owner_info']));
$mentor_tagline = trim(mysqli_real_escape_string($conn, $_POST['mentor_tagline']));
$mentor_contact_no = trim(mysqli_real_escape_string($conn, $_POST['mentor_contact_no']));
$mentor_address = trim(mysqli_real_escape_string($conn, $_POST['mentor_address']));
$mentor_info = trim(mysqli_real_escape_string($conn, $_POST['mentor_info']));
$secondary_name = trim(mysqli_real_escape_string($conn, $_POST['secondary_name']));
$secondary_start = trim(mysqli_real_escape_string($conn, $_POST['secondary_start']));
$secondary_finish = trim(mysqli_real_escape_string($conn, $_POST['secondary_finish']));
$secondary_info = trim(mysqli_real_escape_string($conn, $_POST['secondary_info']));
$higher_name = trim(mysqli_real_escape_string($conn, $_POST['higher_name']));
$higher_start = trim(mysqli_real_escape_string($conn, $_POST['higher_start']));
$higher_finish = trim(mysqli_real_escape_string($conn, $_POST['higher_finish']));
$higher_info = trim(mysqli_real_escape_string($conn, $_POST['higher_info']));
$first_exp_title = trim(mysqli_real_escape_string($conn, $_POST['first_exp_title']));
$first_exp_company = trim(mysqli_real_escape_string($conn, $_POST['first_exp_company']));
$first_exp_start = trim(mysqli_real_escape_string($conn, $_POST['first_exp_start']));
$first_exp_finish = trim(mysqli_real_escape_string($conn, $_POST['first_exp_finish']));
$first_exp_info = trim(mysqli_real_escape_string($conn, $_POST['first_exp_info']));
$second_exp_title = trim(mysqli_real_escape_string($conn, $_POST['second_exp_title']));
$second_exp_company = trim(mysqli_real_escape_string($conn, $_POST['second_exp_company']));
$second_exp_start = trim(mysqli_real_escape_string($conn, $_POST['second_exp_start']));
$second_exp_finish = trim(mysqli_real_escape_string($conn, $_POST['second_exp_finish']));
$second_exp_info = trim(mysqli_real_escape_string($conn, $_POST['second_exp_info']));
$third_exp_title = trim(mysqli_real_escape_string($conn, $_POST['third_exp_title']));
$third_exp_company = trim(mysqli_real_escape_string($conn, $_POST['third_exp_company']));
$third_exp_start = trim(mysqli_real_escape_string($conn, $_POST['third_exp_start']));
$third_exp_finish = trim(mysqli_real_escape_string($conn, $_POST['third_exp_finish']));
$third_exp_info = trim(mysqli_real_escape_string($conn, $_POST['third_exp_info']));


// $sql = "UPDATE `company` SET `company_email` = ?, `company_address` = ?, `company_contact_number` = ?, `company_info` = ?, `company_owner_info` = ?, `company_tagline` = ? WHERE `company`.`company_ID` = $companyID;";
// $stmt = mysqli_stmt_init($conn);

// if (!mysqli_stmt_prepare($stmt, $sql)) {
//   die('SQL Failed: ' . mysqli_error($conn));
// } else {
//   mysqli_stmt_bind_param($stmt, "ssssss", $companyEmail, $companyAddress, $companyContactNo, $companyInfo, $companyOwnerInfo, $companyTagline);
//   mysqli_stmt_execute($stmt);
// }

$sql2 = "UPDATE `mentor` SET `mentor_tagline` = ?, `mentor_info` = ?, `mentor_contact_no` = ?, `mentor_address` = ?, `secondary_name` = ?, `secondary_start` = ?, `secondary_finish` = ?, `secondary_info` = ?, `higher_name` = ?, `higher_start` = ?, `higher_finish` = ?, `higher_info` = ?, `first_exp_title` = ?, `first_exp_company` = ?, `first_exp_start` = ?, `first_exp_finish` = ?, `first_exp_info` = ?, `second_exp_title` = ?, `second_exp_company` = ?, `second_exp_start` = ?, `second_exp_finish` = ?, `second_exp_info` = ?, `third_exp_title` = ?, `third_exp_company` = ?, `third_exp_start` = ?, `third_exp_finish` = ?, `third_exp_info` = ? WHERE `mentor`.`mentor_id` = $mentorID;";
$stmt2 = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt2, $sql2)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt2, "sssssssssssssssssssssssssss", $mentor_tagline, $mentor_contact_no, $mentor_address, $mentor_info ,
  $secondary_name, 
  $secondary_start, 
  $secondary_finish, 
  $secondary_info, 
  $higher_name, 
  $higher_start, 
  $higher_finish, 
  $higher_info,
  $first_exp_title, 
  $first_exp_company, 
  $first_exp_start, 
  $first_exp_finish, 
  $first_exp_info,
  $second_exp_title, 
  $second_exp_company, 
  $second_exp_start, 
  $second_exp_finish, 
  $second_exp_info,
  $third_exp_title, 
  $third_exp_company, 
  $third_exp_start, 
  $third_exp_finish, 
  $third_exp_info);
  mysqli_stmt_execute($stmt2);
}