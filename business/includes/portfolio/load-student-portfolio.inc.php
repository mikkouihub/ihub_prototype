<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$studentID = $_SESSION['userID'];
$url = $_SESSION['student_url'];

$sql = "SELECT * FROM `portfolio` WHERE user_id = $studentID";
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
        <th>Portfolio</th>
        <th>Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>';

  if ($resultCheck > 0) {
    $count = 0;
    
    $sql = "SELECT * FROM `portfolio` WHERE user_id = $studentID ORDER BY portfolio_ID DESC";
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
                <a href="' . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'portfolio' . DIRECTORY_SEPARATOR . $row['portfolio_image'] . '" class="popup-image" data-effect="mfp-3d-unfold">
                  <img style="object-fit: cover; width: 250; height: 250;" class="img-responsive" src="' . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'portfolio' . DIRECTORY_SEPARATOR . $row['portfolio_image'] . '" alt="' . $row['portfolio_name'] . '">
                </a>
              </figure>
            </td>
            <td>' . $row['portfolio_name'] . '</td>
            <td>' . $row['portfolio_desc'] . '</td>
            <td>
              <button type="submit" class="btn btn-warning btn-xs edit" id="' . $row['portfolio_ID'] . '">Edit</button>
            </td>
            <td>
              <button type="submit" class="btn btn-danger btn-xs delete" id="' . $row['portfolio_ID'] . '" data-portfolio_image="' . $row['portfolio_image'] . '">Delete</button>
            </td>
          </tr>';
      }
    }
  } else {
    $output .=
      '<tr>
        <td colspan="7" style="text-align: center;">
          No Portfolio/s Yet.
        </td>
      </tr>';
  }

  $output .= '</table>';
  echo $output;
}