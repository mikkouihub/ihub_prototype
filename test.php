<?php
  if (get_magic_quotes_gpc()) {
    echo "<h1>Hi</h1>";
  } else {
    echo "<h1>Hello</h1>";
  }
?>