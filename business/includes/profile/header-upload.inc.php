<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

if (isset($_SESSION['studentID'])) {
  // Student
  $studentID = $_SESSION['studentID'];
  $url = $_SESSION['student_url'];

  $targetDir = "student_header";

  if (!empty($_FILES['file_header']['name'])) {
    $fileName = basename($_FILES['file_header']['name']);
    $fileExt =explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
  
    // Upload file to server
    $name = basename($fileName, ".".$fileActualExt);
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
  
    $fileDestination = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $fileNameNew;
  
    if (move_uploaded_file($_FILES["file_header"]["tmp_name"], $fileDestination)) {
      $sql = "SELECT * FROM student WHERE student_id = $studentID";
      $stmt = mysqli_stmt_init($conn);
  
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('SQL Failed: ' . mysqli_error($conn));
      } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
          
        while ($row = mysqli_fetch_assoc($result)) {
          if (!empty($row['student_header_image'])) {
            $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'students' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $row['student_header_image'];
    
            unlink($filePath);
    
            $sql = "UPDATE `student` SET `student_header_image` = ? WHERE `student`.`student_id` = $studentID;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die('SQL Failed: ' . mysqli_error($conn));
            } else {
              mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
              mysqli_stmt_execute($stmt);
    ?>
              <script>
                var header_div = document.querySelector('#header_background_image');
    
                header_div.style.backgroundImage = "url('students/<?php echo $_SESSION['student_url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>')";
              </script>
    <?php
            }
          } else {
            $sql = "UPDATE `student` SET `student_header_image` = ? WHERE `student`.`student_id` = $studentID;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die('SQL Failed: ' . mysqli_error($conn));
            } else {
              mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
              mysqli_stmt_execute($stmt);
    ?>
              <script>
                var header_div = document.querySelector('#header_background_image');
    
                header_div.style.backgroundImage = "url('students/<?php echo $_SESSION['student_url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>')";
              </script>
    <?php
            }
          }
        }
      }
    }
  }
} elseif (isset($_SESSION['mentorID'])) {
  // Mentor
  $mentorID = $_SESSION['mentorID'];
  $url = $_SESSION['mentor_url'];

  $targetDir = "mentor_header";

  if (!empty($_FILES['file_header']['name'])) {
    $fileName = basename($_FILES['file_header']['name']);
    $fileExt =explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
  
    // Upload file to server
    $name = basename($fileName, ".".$fileActualExt);
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
  
    $fileDestination = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $fileNameNew;
  
    if (move_uploaded_file($_FILES["file_header"]["tmp_name"], $fileDestination)) {
      $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
      $stmt = mysqli_stmt_init($conn);
  
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('SQL Failed: ' . mysqli_error($conn));
      } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
          
        while ($row = mysqli_fetch_assoc($result)) {
          if (!empty($row['mentor_header_image'])) {
            $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'mentors' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $row['mentor_header_image'];
    
            unlink($filePath);
    
            $sql = "UPDATE `mentor` SET `mentor_header_image` = ? WHERE `mentor`.`mentor_id` = $mentorID;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die('SQL Failed: ' . mysqli_error($conn));
            } else {
              mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
              mysqli_stmt_execute($stmt);
    ?>
              <script>
                var header_div = document.querySelector('#header_background_image');
    
                header_div.style.backgroundImage = "url('mentors/<?php echo $_SESSION['mentor_url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>')";
              </script>
    <?php
            }
          } else {
            $sql = "UPDATE `mentor` SET `mentor_header_image` = ? WHERE `mentor`.`mentor_id` = $mentorID;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die('SQL Failed: ' . mysqli_error($conn));
            } else {
              mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
              mysqli_stmt_execute($stmt);
    ?>
              <script>
                var header_div = document.querySelector('#header_background_image');
    
                header_div.style.backgroundImage = "url('mentors/<?php echo $_SESSION['mentor_url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>')";
              </script>
    <?php
            }
          }
        }
      }
    }
  }
} elseif (isset($_SESSION['companyID'])) {
  // Company
  $companyID = $_SESSION['companyID'];
  $url = $_SESSION['company_url'];

  $targetDir = "company_header";

  if (!empty($_FILES['file_header']['name'])) {
    $fileName = basename($_FILES['file_header']['name']);
    $fileExt =explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
  
    // Upload file to server
    $name = basename($fileName, ".".$fileActualExt);
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
  
    $fileDestination = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $fileNameNew;
  
    if (move_uploaded_file($_FILES["file_header"]["tmp_name"], $fileDestination)) {
      $sql = "SELECT * FROM company WHERE company_ID = $companyID";
      $stmt = mysqli_stmt_init($conn);
  
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('SQL Failed: ' . mysqli_error($conn));
      } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
          
        while ($row = mysqli_fetch_assoc($result)) {
          if (!empty($row['company_header_image'])) {
            $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $row['company_header_image'];
    
            unlink($filePath);
    
            $sql = "UPDATE `company` SET `company_header_image` = ? WHERE `company`.`company_ID` = $companyID;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die('SQL Failed: ' . mysqli_error($conn));
            } else {
              mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
              mysqli_stmt_execute($stmt);
    ?>
              <script>
                var header_div = document.querySelector('#header_background_image');
    
                header_div.style.backgroundImage = "url('companies/<?php echo $_SESSION['company_url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>')";
              </script>
    <?php
            }
          } else {
            $sql = "UPDATE `company` SET `company_header_image` = ? WHERE `company`.`company_ID` = $companyID;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              die('SQL Failed: ' . mysqli_error($conn));
            } else {
              mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
              mysqli_stmt_execute($stmt);
    ?>
              <script>
                var header_div = document.querySelector('#header_background_image');
    
                header_div.style.backgroundImage = "url('companies/<?php echo $_SESSION['company_url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>')";
              </script>
    <?php
            }
          }
        }
      }
    }
  }
}