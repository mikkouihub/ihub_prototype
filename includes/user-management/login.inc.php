<?php

require '..' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

// Create User
if (isset($_POST['btn-login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please input a valid email!";
		exit();
  } else {
    $sql = "SELECT * FROM user WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      $resultCheck = mysqli_stmt_num_rows($stmt);

      if ($resultCheck == 0) {
        echo "Account does not exist";
        exit();
      } else {
        // Create a template
        $sql = "SELECT * FROM user WHERE user_email = ?;";
        // Create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        // Prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          die('SQL Failed: ' . mysqli_error($conn));
        } else {
          // Bind the parameters to the placeholders
          mysqli_stmt_bind_param($stmt, "s", $email);
          // Run parameters inside the database
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
            $passCheck = password_verify($password, $row['user_password']);
            if ($passCheck == false) {
              echo "Incorrect Email/Password!";
              exit();
            } elseif ($passCheck == true) {
              if ($row['is_verified'] == 0) {
                echo "Your account has not yet been validated";
                exit();
              } else {
                session_start();

                $_SESSION['loggedIn'] = true;
                
                $_SESSION['userID'] = $row['user_ID'];
                $_SESSION['userName'] = $row['user_name'];
                $_SESSION['userEmail'] = $row['user_email'];

                $sql = "SELECT * FROM user, company WHERE user.user_ID = ? AND company.user_ID = ?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  die('SQL Failed: ' . mysqli_error($conn));
                } else {
                  mysqli_stmt_bind_param($stmt, "ss", $_SESSION['userID'], $_SESSION['userID']);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row_company = mysqli_fetch_assoc($result)) {
                    $_SESSION['companyID'] = $row_company['company_ID'];
                    $_SESSION['businessType'] = $row_company['company_business_type'];
                    $_SESSION['subCategory'] = $row_company['company_business_category'];
                    $_SESSION['companyName'] = $row_company['company_name'];
                    $_SESSION['companyAddress'] = $row_company['company_address'];
                    $_SESSION['contactNo'] = $row_company['company_contact_number'];
                    $_SESSION['companyEmail'] = $row_company['company_email'];
                    $_SESSION['url'] = $row_company['company_url'];
                    
                    // $_SESSION['companyOwnerImage'] = $row_company['company_owner_image'];
                    // $_SESSION['companyLogoImage'] = $row_company['company_logo_image'];
                    // $_SESSION['companyHeaderImage'] = $row_company['company_header_image'];
                    $_SESSION['companyVideos'] = $row_company['company_videos'];
                    $_SESSION['companyTagline'] = $row_company['company_tagline'];
                    $_SESSION['companyInfo'] = $row_company['company_info'];
                    $_SESSION['companyOwnerInfo'] = $row_company['company_owner_info'];

                    echo "success";
                    exit();
                  }
                }
              }
            } else {
              echo "Incorrect Email/Password!";
              exit();
            }
          }
        }
      }
    }
  }
}