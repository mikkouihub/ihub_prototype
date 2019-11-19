<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

if (count($_FILES["product-service-files"]["name"]) > 0) {
  sleep(3);

  for ($count = 0; $count < count($_FILES["product-service-files"]["name"]); $count++) { 
    $file_name = $_FILES["product-service-files"]["name"][$count];
    $tmp_name = $_FILES["product-service-files"]['tmp_name'][$count];
    $file_array = explode(".", $file_name);
    $file_extension = end($file_array);

    $file_name = uniqid('', true) . "." . $file_extension;

    $fileLocation = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'products-services' . DIRECTORY_SEPARATOR . $file_name;

    if (move_uploaded_file($tmp_name, $fileLocation)) {
      $sql = "INSERT INTO `company_product_service` (`product_service_ID`, `product_service_image`, `product_service_name`, `product_service_price`, `product_service_description`, `product_service_type`, `product_service_category`, `product_service_sub_category`, `is_featured`, `is_deleted`, `company_ID`) VALUES (NULL, ?, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', $companyID);";
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