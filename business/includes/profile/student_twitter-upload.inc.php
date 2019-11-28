<?php

session_start();

require '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

$studentID = $_SESSION['studentID'];

if (!empty($_POST['twitter-link'])) {
  $link = trim(mysqli_real_escape_string($conn, $_POST['twitter-link']));

  preg_match("/(?:(?:http|https):\/\/)?(?:www.)?twitter.com\/([a-zA-Z0-9_]+)/", $link, $matches);

  $id = $matches[1];

  $sql = "UPDATE `student` SET `student_twitter` = ? WHERE student_id = $studentID;";
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