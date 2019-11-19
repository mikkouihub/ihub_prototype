<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

echo '<option value="">Select Category</option>';

if (isset($_POST['company_business_type'])) {
  $categories = array("Agriculture & Food", "Apparel, Textiles & Accessories", "Maintenance & Repair", "Auto & Transportation", "Business & Commercial", "Computer Electronics", "Electronics & Electrical Equipments", "Health & Beauty", "Home, Lights & Construction", "House Cleaning", "House Improvement", "Machinery, Industrial Parts & Tools", "Packaging, Advertising & Office");

  $ncat = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
  $len = count($categories);

  for ($i=0; $i < $len; $i++) { 
    $current = $categories[$i];
    $current1 = $ncat[$i];
    
    $data = array();

    $sql = "SELECT category_id, category_name FROM `company_category`, `company` WHERE company_business_category LIKE '%|$current1|%' AND category_id = '$current1' AND company_ID = $companyID";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
      }
    }
  }
}