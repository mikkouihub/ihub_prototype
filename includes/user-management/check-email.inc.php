<?php

require '..' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

if ( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {
  
  $email = trim(mysqli_real_escape_string($conn, $_REQUEST['email']));
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  $sql = "SELECT * FROM user WHERE user_email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);

    if ($resultCheck > 0) {
      echo 'false';
    } else {
      echo 'true'; 
    }
  }
}