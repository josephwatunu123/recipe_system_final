<?php
echo "Redirecting";
  if(isset($_POST["submit"])){

    header("location: index.php");
  }
  else
  header("location: signup_page.php");

