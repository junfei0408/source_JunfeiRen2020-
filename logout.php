<?php
session_start();
//logout

  unset($_SESSION["userID"]);
  unset($_SESSION["username"]);
  unset($_SESSION["admin"]);
  unset($_SESSION["type"]);

  session_destroy();
  header("location: index.php");

 ?>
