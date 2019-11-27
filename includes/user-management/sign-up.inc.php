<?php

require '..' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

// Create User
if (isset($_POST['_utf8'])) {

  $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullName']));
  $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
  $confirmPassword = trim(mysqli_real_escape_string($conn, $_POST['confirmPassword']));

  $userType = trim($_POST['userType']);
  
  // Pasword Length
  $passwordLength = strlen($password);

  // For directory
  $folder = str_replace(' ', '-', strtolower($fullname));
  $url = preg_replace('/[^A-Za-z0-9\-]/', '', $folder);
  
  // ~~~~~~~~~~~~~~~~~~~~~ Error Handling ~~~~~~~~~~~~~~~~~~~~~
  if (!preg_match("/^(?![\s.]+$)[a-zA-Z\s.]*$/", $fullname) || !preg_match("/.+\@.+\..+/", $email)) {
    echo"Invalid characters";
		exit();
  } else {
    // Check is email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email address!";
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
          echo "Email already taken!";
				  exit();
        } else {
          if ($passwordLength < 6) {
            echo"short password";
					  exit();
          } else {
            if ($password != $confirmPassword) {
              echo"mismatch";
						  exit();
            } else {
              if (empty($userType)) {
                echo"Empty User Type";
							  exit();
              } else {
                $sql = "INSERT INTO `user` (`user_ID`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES (NULL, ?, ?, ?, ?);";
                // Create a prepared statement
                $stmt = mysqli_stmt_init($conn);
                // Prepare the prepared statement
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  die('SQL Failed: ' . mysqli_error($conn));
                } else {
                  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                  // $hashedToken = password_hash($token, PASSWORD_DEFAULT);

                  // Bind the parameters to the placeholders
                  mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $hashedPassword, $userType);
                  // Run parameters inside the database
                  if (mysqli_stmt_execute($stmt)) {
                    $user_fk = mysqli_insert_id($conn);

                    if ($userType === "Student") {
                      $sql = "INSERT INTO `student` (`student_id`, `student_tagline`, `full_name`, `student_info`, `student_contact_no`, `student_address`, `student_url`, `preparatory_name`, `preparatory_start`, `preparatory_finish`, `preparatory_info`, `secondary_name`, `secondary_start`, `secondary_finish`, `secondary_info`, `higher_name`, `higher_start`, `higher_finish`, `higher_info`, `first_exp_title`, `first_exp_company`, `first_exp_start`, `first_exp_finish`, `first_exp_info`, `second_exp_title`, `second_exp_company`, `second_exp_start`, `second_exp_finish`, `second_exp_info`, `third_exp_title`, `third_exp_company`, `third_exp_start`, `third_exp_finish`, `third_exp_info`, `student_facebook`, `student_twitter`, `student_instagram`, `student_linkedin`, `student_owner_image`, `student_header_image`, `user_ID`) VALUES (NULL, '', ?, '', '', '', ?, '', NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', '', '', '', '', ?);";
                      $stmt = mysqli_stmt_init($conn);

                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die('SQL Failed: ' . mysqli_error($conn));
                      } else {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $url, $user_fk);
                        mysqli_stmt_execute($stmt);

                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url;
                        mkdir($target_dir, true);
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'documents';
                        mkdir($target_dir, true);
                        chmod($target_dir, 0777);

                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "student_owner";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "student_logo";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "student_header";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);

                        $sql = "SELECT * FROM user, student WHERE user.user_ID = $user_fk AND student.user_ID = $user_fk";
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
                            $_SESSION['userType'] = $row['user_type'];

                            $_SESSION['student_url'] = $row['student_url'];
                            $_SESSION['studentID'] = $row['student_id'];
                            // $_SESSION['url'] = $row['company_url'];

                            echo "success";
                            exit();
                          }
                        }
                      }
                    } elseif ($userType === "Mentor") {
                      $sql = "INSERT INTO `mentor` (`mentor_id`, `mentor_tagline`, `full_name`, `mentor_info`, `mentor_contact_no`, `mentor_address`, `mentor_url`, `secondary_name`, `secondary_start`, `secondary_finish`, `secondary_info`, `higher_name`, `higher_start`, `higher_finish`, `higher_info`, `first_exp_title`, `first_exp_company`, `first_exp_start`, `first_exp_finish`, `first_exp_info`, `second_exp_title`, `second_exp_company`, `second_exp_start`, `second_exp_finish`, `second_exp_info`, `third_exp_title`, `third_exp_company`, `third_exp_start`, `third_exp_finish`, `third_exp_info`, `mentor_owner_image`, `mentor_header_image`, `user_ID`) VALUES (NULL, '', ?, '', '', '', ?, '', NULL, NULL, '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', ?);";
                      $stmt = mysqli_stmt_init($conn);

                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die('SQL Failed: ' . mysqli_error($conn));
                      } else {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $url, $user_fk);
                        mysqli_stmt_execute($stmt);

                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url;
                        mkdir($target_dir, true);
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'documents';
                        mkdir($target_dir, true);
                        chmod($target_dir, 0777);

                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "mentor_owner";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "mentor_logo";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);
                        $target_dir = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'business' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "mentor_header";
                        mkdir($target_dir, true);						
                        chmod($target_dir, 0777);

                        $sql = "SELECT * FROM user, mentor WHERE user.user_ID = $user_fk AND mentor.user_ID = $user_fk";
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
                            $_SESSION['userType'] = $row['user_type'];

                            $_SESSION['mentor_url'] = $row['mentor_url'];
                            $_SESSION['mentorID'] = $row['mentor_id'];
                            // $_SESSION['url'] = $row['company_url'];

                            echo "success";
                            exit();
                          }
                        }
                      }
                    } elseif ($userType === "Company") {
                      $sql = "INSERT INTO `company` (`company_ID`, `company_name`, `company_email`, `company_address`, `company_contact_number`, `company_business_type`, `company_business_category`, `company_info`, `company_owner_info`, `company_tagline`, `company_url`, `company_header_image`, `company_logo_image`, `company_owner_image`, `company_videos`, `user_ID`) VALUES (NULL, ?, '', '', '', '', '', '', '', '', ?, '', '', '', '', ?);";
                      $stmt = mysqli_stmt_init($conn);

                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die('SQL Failed: ' . mysqli_error($conn));
                      } else {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $url, $user_fk);
                        
                        if (mysqli_stmt_execute($stmt)) {
                          $company_fk = mysqli_insert_id($conn);

                          $sql = "INSERT INTO `company_social_media` (`media_ID`, `media_facebook`, `media_twitter`, `media_instagram`, `media_linkedin`, `media_rss`, `company_ID`) VALUES (NULL, '', '', '', '', '', $company_fk);";
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
                                $_SESSION['userType'] = $row['user_type'];

                                $_SESSION['companyID'] = $row['company_ID'];
                                $_SESSION['businessType'] = $row['company_business_type'];
                                $_SESSION['subCategory'] = $row['company_business_category'];
                                $_SESSION['companyName'] = $row['company_name'];
                                $_SESSION['companyAddress'] = $row['company_address'];
                                $_SESSION['contactNo'] = $row['company_contact_number'];
                                $_SESSION['companyEmail'] = $row['company_email'];
                                $_SESSION['company_url'] = $row['company_url'];
                                
                                // $_SESSION['companyOwnerImage'] = $row['company_owner_image'];
                                // $_SESSION['companyLogoImage'] = $row['company_logo_image'];
                                // $_SESSION['companyHeaderImage'] = $row['company_header_image'];
                                $_SESSION['companyVideos'] = $row['company_videos'];
                                $_SESSION['companyTagline'] = $row['company_tagline'];
                                $_SESSION['companyInfo'] = $row['company_info'];
                                $_SESSION['companyOwnerInfo'] = $row['company_owner_info'];

                                echo "success";
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