<?php
  $link = mysqli_connect('host', 'username', 'password');

  if (mysqli_connect_errno()){
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
  }

  if (!mysqli_set_charset($link, 'UTF8')){
    echo 'Unable to set database connection encoding.';
    exit();
  }

  if(!mysqli_select_db($link, 'dbname')){
    echo 'Unable to locate database.';
    exit();
  }
?>
