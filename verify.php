<?php
session_start();

$user = 'username';
$passw = 'P@ssw0rd';

if (($_POST["username"] == $user) and ($_POST["password"] == $passw)) {
  $_SESSION["login"] = "true";
  header("Location:./entries/view-entries.php");
  exit;
} else {
  $_SESSION["error"] = "<font color=red>Wrong username or password. Try again.</font>";
  header("Location:index.php");
}
?>
