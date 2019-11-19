<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$sql = "SELECT * FROM `company_product_service` WHERE product_service_ID = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "s", $_POST['product_service_id']);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $output['product_service_name'] = $row["product_service_name"];
    $output['product_service_price'] = $row["product_service_price"];
    // $output['Minimum_Order_Quantity'] = $row["Min_Order_Quantity"];
    $output['product_service_type'] = $row["product_service_type"];
    $output['product_service_category'] = $row["product_service_category"];
    $output['product_service_sub_category'] = $row["product_service_sub_category"];
    $output['product_service_description'] = $row["product_service_description"];
  }

  echo json_encode($output);
}