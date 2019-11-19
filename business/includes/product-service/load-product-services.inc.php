<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$sql = "SELECT * FROM `company_product_service` WHERE company_ID = $companyID";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die('SQL Failed: ' . mysqli_error($conn));
} else {
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  $resultCheck = mysqli_stmt_num_rows($stmt);
  
  $output = 
    '<table class="table table-bordered table-striped">
      <tr>
        <th>Sr. No</th>
        <th>Product/<br>Service</th>
        <th>Name</th>
        <th>Price</th>
        <th>Business Type</th>
        <th>Category</th>
        <th>Sub-category</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>';

  if ($resultCheck > 0) {
    $count = 0;
    
    $sql = "SELECT * FROM `company_product_service` WHERE company_ID = $companyID ORDER BY product_service_ID DESC";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        $output .= 
          '<tr>
            <td>' . $count . '</td>
            <td>
              <figure class="port-effect-up">
                <a href="' . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'products-services' . DIRECTORY_SEPARATOR . $row['product_service_image'] . '" class="popup-image" data-effect="mfp-3d-unfold">
                  <img style="object-fit: cover; width: 250; height: 250;" class="img-responsive" src="' . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'products-services' . DIRECTORY_SEPARATOR . $row['product_service_image'] . '" alt="' . $row['product_service_name'] . '">
                </a>
              </figure>
            </td>
            <td>' . $row['product_service_name'] . '</td>
            <td>' . '₱' . number_format($row["product_service_price"], 2) . '</td>
            <td>' . $row['product_service_type'] . '</td>
            <td>' . $row['product_service_category'] . '</td>
            <td>' . $row['product_service_sub_category'] . '</td>
            <td>' . $row['product_service_description'] . '</td>
            <td>
              <button type="submit" class="btn btn-warning btn-xs edit" id="' . $row['product_service_ID'] . '">Edit</button>
            </td>
            <td>
              <button type="submit" class="btn btn-danger btn-xs delete" id="' . $row['product_service_ID'] . '" data-client_image="' . $row['product_service_image'] . '">Delete</button>
            </td>
          </tr>';
      }
    }
  } else {
    $output .=
      '<tr>
        <td colspan="11" style="text-align: center;">
          No Products/Services Yet.
        </td>
      </tr>';
  }

  $output .= '</table>';
  echo $output;
}