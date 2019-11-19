<?php

require '..' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

// Create User
if (isset($_POST['btn-register'])) {

  $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullName']));
  $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
  $confirmPassword = trim(mysqli_real_escape_string($conn, $_POST['confirmPassword']));

  $businessType = trim($_POST['businessType']);
  $subCategory = implode(', ', $_POST['subCategory']);
  $companyName = trim(mysqli_real_escape_string($conn, $_POST['companyName']));
  $companyName = stripslashes($_POST['companyName']);
	$companyAddress = trim(mysqli_real_escape_string($conn, $_POST['companyAddress']));
  $contactNo = trim(mysqli_real_escape_string($conn, $_POST['contactNo']));
  $registrationCode = trim(mysqli_real_escape_string($conn, $_POST['code']));
  $code = '%' . $registrationCode . '%';
  
  // Pasword Length
  $passwordLength = strlen($password);

  // For directory
  $company = str_replace(' ', '-', strtolower($companyName));
  $url = preg_replace('/[^A-Za-z0-9\-]/', '', $company);
  
  // ~~~~~~~~~~~~~~~~~~~~~ Error Handling ~~~~~~~~~~~~~~~~~~~~~
  if (!preg_match("/^(?![\s.]+$)[a-zA-Z\s.]*$/", $fullname) || !preg_match("/.+\@.+\..+/", $email) || !preg_match("/(^(\+)?639-?([0-9]{10}))|([0-9]{3}-?[0-9]{4})/", $contactNo)) {
    header('Location: ../../register.php?invalidCharacters');
		exit();
  } else {
    // Check is email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header('Location: ../../register.php?invalidEmail');
			exit();
    } else {
      // Check if email exist

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
          header('Location: ../../register.php?emailTaken');
				  exit();
        } else {
          if ($passwordLength < 6) {
            header('Location: ../../register.php?shortPassword');
					  exit();
          } else {
            if ($password != $confirmPassword) {
              header('Location: ../../register.php?passwordNotMatched');
						  exit();
            } else {
              if (empty($businessType)) {
                header('Location: ../../register.php?noBusinessType');
							  exit();
              } else {
                if (empty($subCategory)) {
                  header('Location: ../../register.php?noSubCategory');
							    exit();
                } else {
                  // Check for Registration Code

                  $sql = "SELECT * FROM registration_code WHERE codes LIKE ?;";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                    die('SQL Failed: ' . mysqli_error($conn));
                  } else {
                    mysqli_stmt_bind_param($stmt, "s", $code);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    $resultCheck = mysqli_stmt_num_rows($stmt);

                    if ($resultCheck == 0) {
                      header('Location: ../../register.php?noCode');
                      exit();
                    } else {
                      $sql = "INSERT INTO `user` (`user_ID`, `user_name`, `user_email`, `user_password`, `is_verified`) VALUES (NULL, ?, ?, ?, '1');";
                      // Create a prepared statement
                      $stmt = mysqli_stmt_init($conn);
                      // Prepare the prepared statement
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'SQL Failed: ' . mysqli_error($conn);
                      } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        // $hashedToken = password_hash($token, PASSWORD_DEFAULT);

                        // Bind the parameters to the placeholders
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashedPassword);
                        // Run parameters inside the database
                        if (mysqli_stmt_execute($stmt)) {
                          $user_fk = mysqli_insert_id($conn);

                          $sql = "INSERT INTO `company` (`company_ID`, `company_name`, `company_address`, `company_contact_number`, `company_business_type`, `company_business_category`, `company_url`,  `user_ID`) VALUES (NULL, ?, ?, ?, ?, ?, ?, $user_fk);";
                          $stmt = mysqli_stmt_init($conn);

                          if (!mysqli_stmt_prepare($stmt, $sql)) {
                            die('SQL Failed: ' . mysqli_error($conn));
                          } else {
                            mysqli_stmt_bind_param($stmt, "ssssss", $companyName, $companyAddress, $contactNo, $businessType, $subCategory, $url);
                            
                            if (mysqli_stmt_execute($stmt)) {
                              $company_fk = mysqli_insert_id($conn);

                              $sql = "INSERT INTO `company_social_media` (`media_ID`, `media_facebook`, `medoa_twitter`, `media_google`, `media_linkedin`, `media_rss`, `company_ID`) VALUES (NULL, '', '', '', '', '', $company_fk);";
                              $stmt = mysqli_stmt_init($conn);

                              if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die('SQL Failed: ' . mysqli_error($conn));
                              } else {
                                mysqli_stmt_execute($stmt);
                                
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url;
                                mkdir($target_dir, true);
                                chmod($target_dir, 0777);
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'documents';
                                mkdir($target_dir, true);
                                chmod($target_dir, 0777);

                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "company_owner";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "company_logo";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "company_header";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "products-services";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);

                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "testimonials";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);
                                $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "clients";
                                mkdir($target_dir, true);						
                                chmod($target_dir, 0777);

                                $sql = "SELECT * FROM user, company WHERE user.user_ID = $user_fk AND company.user_ID = $user_fk";
                                $stmt = mysqli_stmt_init($conn);

                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                  die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                  mysqli_stmt_execute($stmt);
                                  $result = mysqli_stmt_get_result($stmt);

                                  while ($row = mysqli_fetch_assoc($result)) {
                                    session_start();
                                    
                                    $_SESSION['loggedIn'] = true;

                                    $_SESSION['userID'] = $row['user_ID'];
                                    $_SESSION['userName'] = $row['user_name'];
                                    $_SESSION['userEmail'] = $row['user_email'];

                                    $_SESSION['companyID'] = $row['company_ID'];
                                    $_SESSION['businessType'] = $row['company_business_type'];
                                    $_SESSION['subCategory'] = $row['company_business_category'];
                                    $_SESSION['companyName'] = $row['company_name'];
                                    $_SESSION['companyAddress'] = $row['company_address'];
                                    $_SESSION['contactNo'] = $row['company_contact_number'];
                                    $_SESSION['companyEmail'] = $row['company_email'];
                                    $_SESSION['url'] = $row['company_url'];
                                    
                                    // $_SESSION['companyOwnerImage'] = $row['company_owner_image'];
                                    // $_SESSION['companyLogoImage'] = $row['company_logo_image'];
                                    // $_SESSION['companyHeaderImage'] = $row['company_header_image'];
                                    $_SESSION['companyVideos'] = $row['company_videos'];
                                    $_SESSION['companyTagline'] = $row['company_tagline'];
                                    $_SESSION['companyInfo'] = $row['company_info'];
                                    $_SESSION['companyOwnerInfo'] = $row['company_owner_info'];

                                    header('Location: ../../index.php?registerSuccessfully');
                                    exit();
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  // Create a template
                  // $sql = "INSERT INTO `user` (`user_ID`, `user_name`, `user_email`, `user_password`, `user_token`, `is_verified`, `is_confirmed`) VALUES (NULL, ?, ?, ?, ?, '0', '0');";
                  // $sql = "INSERT INTO `user` (`user_ID`, `user_name`, `user_email`, `user_password`, `user_token`, `is_verified`, `is_confirmed`) VALUES (NULL, ?, ?, ?, ?, '1', '0');";
                  // // Create a prepared statement
                  // $stmt = mysqli_stmt_init($conn);
                  // // Prepare the prepared statement
                  // if (!mysqli_stmt_prepare($stmt, $sql)) {
                  //   echo 'SQL Failed: ' . mysqli_error($conn);
                  // } else {
                  //   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                  //   $hashedToken = password_hash($token, PASSWORD_DEFAULT);

                  //   // Bind the parameters to the placeholders
                  //   mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $hashedPassword, $hashedToken);
                  //   // Run parameters inside the database
                  //   mysqli_stmt_execute($stmt);
                  // }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  // ~~~~~~~~~~~~~~~~~~~~~ Email Verification ~~~~~~~~~~~~~~~~~~~~~

  // Email Verification Token
  // $token = random_bytes(32);

  // Email Verification URL
  // $url = "http://dev.arka.revastaff.com/email-verification.php?email=" . $email . "&validator=" . bin2hex($token);

  // Send the actual email

  // $sendTo = $email;
  // $subject = 'Email Verification for ARKA';
  // $message = '<p>Thank you for registering to ARKA.PH. Please click the link below to verify your email. If you did not make this request, you can ignore this email.</p>';
  // $message .= '<pHere is verification link: <br>';
  // $message .= '<a href="' . $url . '">' . $url . '</a></p>';

  // $headers = "From: Mikko <support@arka.com>\r\n";
  // $headers .= "Reply-To: nilduenilcinq@gmail.com\r\n";
  // $headers .= "Content-Type: text/html\r\n";

  // mail($sendTo, $subject, $message, $headers);
}