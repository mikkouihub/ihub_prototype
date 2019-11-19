<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];
$url = $_SESSION['url'];

$targetDir = "company_owner";

if (!empty($_FILES['file_owner']['name'])) {
  $fileName = basename($_FILES['file_owner']['name']);
  $fileExt =explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  // Upload file to server
  $name = basename($fileName, ".".$fileActualExt);
  $fileNameNew = uniqid('', true) . "." . $fileActualExt;

  $fileDestination = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $fileNameNew;

  if (move_uploaded_file($_FILES["file_owner"]["tmp_name"], $fileDestination)) {
    $sql = "SELECT * FROM company WHERE company_ID = $companyID";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
        
      while ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['company_owner_image'])) {
          $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'companies' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $targetDir . DIRECTORY_SEPARATOR . $row['company_owner_image'];
  
          unlink($filePath);
  
          $sql = "UPDATE `company` SET `company_owner_image` = ? WHERE `company`.`company_ID` = $companyID;";
          $stmt = mysqli_stmt_init($conn);
  
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            die('SQL Failed: ' . mysqli_error($conn));
          } else {
            mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
            mysqli_stmt_execute($stmt);
  ?>
            <script>
              var owner_img = document.querySelector('#owner_image');
  
              owner_img.src = "companies/<?php echo $_SESSION['url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>";
            </script>
  <?php
          }
        } else {
          $sql = "UPDATE `company` SET `company_owner_image` = ? WHERE `company`.`company_ID` = $companyID;";
          $stmt = mysqli_stmt_init($conn);
  
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            die('SQL Failed: ' . mysqli_error($conn));
          } else {
            mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
            mysqli_stmt_execute($stmt);
  ?>
            <script>
              var owner_img = document.querySelector('#owner_image');
  
              owner_img.src = "companies/<?php echo $_SESSION['url']; ?>/profile/<?php echo $targetDir; ?>/<?php echo $fileNameNew; ?>";
            </script>
  <?php
          }
        }
      }
    }
  }
}