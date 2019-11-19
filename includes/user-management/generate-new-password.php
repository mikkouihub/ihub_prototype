<?php

require '..' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

if (isset($_POST['reset-submit'])) {
  $selector = $_POST['selector'];
  $validator = $_POST['validator'];
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

  if (empty($password) || empty($confirmPassword)) {
    header("Location: create-new-password.php?pwd=empty");
    exit();
  } else {
    if ($password != $confirmPassword) {
      header("Location: create-new-password.php?pwd=notsame");
      exit();
    }
  }

  $currentDate = date("U");

  // Validate the selector from the database
  $sql = "SELECT * FROM password_reset WHERE password_selector = ? AND password_expires >= '$currentDate'";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo 'SQL Failed: ' . mysqli_error($conn);
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $selector);
    mysqli_stmt_execute($stmt);

    // get the result
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "You need to re-submit your reset request.";
      exit();
    } else {
      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row['password_token']);

      if ($tokenCheck === false) {
        echo "You need to re-submit your reset request.";
        exit();
      } elseif ($tokenCheck === true) {
        $tokenEmail = $row['password_email'];
        
        $sql = "SELECT * FROM user WHERE user_email = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo 'SQL Failed: ' . mysqli_error($conn);
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
            echo "There was an error.";
            exit();
          } else {
            $sql = "UPDATE `user` SET `user_password` = ? WHERE `user`.`user_email` = ?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo 'SQL Failed: ' . mysqli_error($conn);
              exit();
            } else {
              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql = "DELETE FROM `password_reset` WHERE `password_reset`.`password_email` = ?";
              $stmt = mysqli_stmt_init($conn);

              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo 'SQL Failed: ' . mysqli_error($conn);
                exit();
              } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: ../../index.php?passwordReset=success");
                exit();
              }
            }
          }
        }
      }
    }
  }
}