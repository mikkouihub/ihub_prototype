<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$sql = "SELECT * FROM `company_document` WHERE company_ID = $companyID";
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
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>';

  if ($resultCheck > 0) {
    $count = 0;

    $sql = "SELECT * FROM `company_document` WHERE company_ID = $companyID ORDER BY document_ID DESC";
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
            <td>' . $row['document_name'] . '</td>
            <td>' . $row['document_category'] . '</td>
            <td>' . $row['document_description'] . '</td>
            <td><button type="submit" class="btn btn-warning btn-xs edit" id="' . $row['document_ID'] . '">Edit</button></td>
            <td><button type="submit" class="btn btn-danger btn-xs delete" id="' . $row['document_ID'] . '" data-document_name="' . $row['document_name'] . '">Delete</button></td>
          </tr>';
      }
    }
  } else {
    $output .=
      '<tr>
        <td colspan="7" style="text-align: center;">
          No Documents Yet.
        </td>
      </tr>';
  }

  $output .= '</table>';
  echo $output;
}