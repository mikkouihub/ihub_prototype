<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

$price = $_POST['product_service_price'];
$image_price = str_replace(',', '', $price);

$type = "";
$category = "";
$sub_category = "";

if (isset($_POST['product_service_id'])) {
  $sql = "UPDATE `company_product_service` SET `product_service_name` = ?, `product_service_price` = ?, `product_service_description` = ?, `product_service_type` = ?, `product_service_category` = ?, `product_service_sub_category` = ? WHERE `company_product_service`.`product_service_ID` = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "sssssss", $_POST["product_service_name"], $image_price, $_POST["product_service_description"], $_POST["product_service_type"], $_POST["product_service_category"], $_POST["product_service_sub_category"], $_POST["product_service_id"]);
    mysqli_stmt_execute($stmt);
  }
}