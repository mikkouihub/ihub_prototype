<?php

require 'cnnection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

// Create User
function registerUser() {
  global $conn;

  if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Create a template
    $sql = "INSERT INTO `user` (`user_ID`, `user_email`, `user_password`) VALUES (NULL, ?, ?);";
    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo 'SQL Failed: ' . mysqli_error($conn);
    } else {
      // Bind the parameters to the placeholders
      mysqli_stmt_bind_param($stmt, "ss", $email, $password);
      // Run parameters inside the database
      mysqli_stmt_execute($stmt);
    }
  }
}

// Reset Password Request
function requestResetPass() {
  global $conn;

  if (isset($_POST['reset-btn'])) {

    // Look inside the database to pin point the token the we need
    // to check the user with when they get back to the website.
    $selector = bin2hex(random_bytes(8));

    // Authenticate the user to make sure that it is the corrent user.
    $token = random_bytes(32);

    // Link to send to the user by email.

    $url = "http://dev.arka.revastaff.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

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
    }

    $sql = "INSERT INTO `password_reset` (`password_ID`, `password_email`, `password_selector`, `password_token`, `password_expires`) VALUES (NULL, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo 'SQL Failed: ' . mysqli_error($conn);
      exit();
    } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

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

    header("Location: index.php?reset=sendToEmail");

  }
}

function checkTokens() {
  $selector = $_GET['selector'];
  $validator = $_GET['validator'];

  if (empty($selector) || empty($validator)) {
    echo "Could not validate your request!";
  } else {
    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

      resetPassword();
?>
      <form action="create-new-password.php" method="POST">
        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
        <input type="text" name="password" id="" placeholder="New Password">
        <input type="text" name="confirmPassword" id="" placeholder="Confirm New Password">
        <button type="submit" name="reset-submit">Reset Password</button>
      </form>
<?php
    }
  }
}

function resetPassword() {
  global $conn;

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

                mysqli_stmt_bind_param($stmt, "ss", $tokenEmail, $hashedPassword);
                mysqli_stmt_execute($stmt);

                $sql = "DELETE FROM `password_reset` WHERE `password_reset`.`password_email` = ?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo 'SQL Failed: ' . mysqli_error($conn);
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                  mysqli_stmt_execute($stmt);
                  header("Location: index.php?passwordReset=success");
                }
              }
            }
          }
        }
      }
    }
  }
}