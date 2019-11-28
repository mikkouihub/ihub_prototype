<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$mentorID = $_SESSION['mentorID'];

if (!empty($_POST['instagram-link'])) {
  $link = trim(mysqli_real_escape_string($conn, $_POST['instagram-link']));

  preg_match("/(?:(?:http|https):\/\/)?(?:www.)?instagram.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\\.(?!\\.))){0,28}(?:[A-Za-z0-9_]))?)/", $link, $matches);

  $id = $matches[1];

  $sql = "UPDATE `mentor` SET `mentor_instagram` = ? WHERE mentor_id = $mentorID;";
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