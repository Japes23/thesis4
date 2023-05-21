<?php 
session_start();

if (isset($_POST['buttonId'])) {
    $buttonId = $_POST['buttonId'];
    echo $buttonId;
    $_SESSION['letterID']=$buttonId;
  }

?>