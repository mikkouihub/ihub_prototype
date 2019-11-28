<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

if (!empty($_POST['facebook-link'])) {
  
  $link = trim(mysqli_real_escape_string($conn, $_POST['facebook-link']));

  // FACEBOOK PROFILE URL
  // preg_match("/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\.-]*)?/", $link, $matches);

  preg_match("/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?([\w\-]*)?/", $link, $matches);
  
  // FACEBOOK PAGE / USERNAME / USERID
  // preg_match('#https?\://(?:www\.)?facebook\.com/(\d+|[A-Za-z0-9\.]+)/?#', $link, $matches);

  $id = $matches[1];

  $sql = "UPDATE `company_social_media` SET `media_facebook` = ? WHERE `company_social_media`.`company_ID` = $companyID;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
?>
    <script>
      // var html_video = document.querySelector('#html-video');

      // html_video.src = "https://www.youtube-nocookie.com/embed/<?php echo $id; ?>>";
    </script>
<?php
  }
}