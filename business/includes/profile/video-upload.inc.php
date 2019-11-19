<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$companyID = $_SESSION['companyID'];

if (!empty($_POST['video-link'])) {
  
  $link = trim(mysqli_real_escape_string($conn, $_POST['video-link']));

  preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $link, $matches);

  $id = $matches[1];

  $sql = "UPDATE `company` SET `company_videos` = ? WHERE `company`.`company_ID` = $companyID;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL Failed: ' . mysqli_error($conn));
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
?>
    <script>
      var html_video = document.querySelector('#html-video');

      html_video.src = "https://www.youtube-nocookie.com/embed/<?php echo $id; ?>";
    </script>
<?php
  }
}