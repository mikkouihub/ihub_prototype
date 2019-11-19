<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

echo '<option value="">Select Sub-category</option>';

if (isset($_POST['category_id'])) {
  $sql = "SELECT * FROM company_subcategory WHERE company_business_type = ? AND category_id = ? ORDER BY subcategory_name ASC";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "ss", $_POST['company_business_type'], $_POST['category_id']);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value="' . $row['subcategory_id'] . '">' . $row['subcategory_name'] . '</option>';
    }
  }
}