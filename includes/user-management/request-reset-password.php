<?php

require '..' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

if (isset($_POST['reset-btn'])) {

  // Look inside the database to pin point the token the we need
  // to check the user with when they get back to the website.
  $selector = bin2hex(random_bytes(8));

  // Authenticate the user to make sure that it is the corrent user.
  $token = random_bytes(32);

  // Link to send to the user by email.

  $url = "https://dev.arka.ph/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;

  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Delete any existing entries of a token in the database
  $sql = "DELETE FROM `password_reset` WHERE `password_reset`.`password_email` = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo 'SQL Failed: ' . mysqli_error($conn);
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $sql = "INSERT INTO `password_reset` (`password_ID`, `password_email`, `password_selector`, `password_token`, `password_expires`) VALUES (NULL, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo 'SQL Failed: ' . mysqli_error($conn);
      exit();
    } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);

      // Send the actual email

      $sendTo = $email;
      $subject = 'Reset password for ARKA';
      $message = '<p>We received a password request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
      $message .= '<pHere is your password reset link: <br>';
      $message .= '<a href="' . $url . '">' . $url . '</a></p>';

      $headers = "From: Mikko <support@arka.com>\r\n";
      $headers .= "Reply-To: nilduenilcinq@gmail.com\r\n";
      $headers .= "Content-Type: text/html\r\n";

      mail($sendTo, $subject, $message, $headers);

      header("Location: ../../index.php?reset=sendToEmail");
      exit();
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}