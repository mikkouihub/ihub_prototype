<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$output = '';

$sql = "SELECT * FROM `company_product_service` WHERE product_service_type = 2 AND company_ID = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_bind_param($stmt, "s", $companyID);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'products-services' . DIRECTORY_SEPARATOR . $row['product_service_image'];

    $output .= 
    '<div class="col-md-4 col-sm-6 col-xs-12 grid inLeft">
        <figure class="port-effect-scale">
            <img src="' . $fileLocation . '" class="img-responsive" alt="' . $row['product_service_name'] . '"/>
            <figcaption>
                <h2><span>' . $row['product_service_name'] . '</span></h2>
                <p>' . $row['product_service_price'] . '</p>
                <a href="' . $fileLocation . '" class="popup-image"
                    data-effect="mfp-move-horizontal">View more</a>
            </figcaption>
        </figure>
    </div>';
  }
}

echo $output;