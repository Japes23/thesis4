<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!--BootStrap Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
  <!--Font Awesome Link-->
  <script src="https://kit.fontawesome.com/c1bce45b9f.js" crossorigin="anonymous"></script>
  <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <!--CSS Link-->
  <link rel="stylesheet" href="styles.css">
  <?php

  $conn=mysqli_connect('localhost','root','','user');
    if($conn==false){
        ("Connection Failed: " .mysqli_connect_error());
    }
  $LoginError = "Invalid UserID and Password";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['loginusername'];
    $password = $_POST['loginpassword'];
    $passwordhash = md5($password);
    $idsql = "SELECT * FROM superadmin WHERE USERNAME='$username' AND PASSWORD='$passwordhash'";
    $results=mysqli_query($conn,$idsql);
    while($rows = mysqli_fetch_array($results)){
    if ($rows['USERNAME'] == $username && $rows['PASSWORD'] == $passwordhash){
      $LoginError = "";
      }
    else{
      $LoginError = "";
    }
    }
  }
  ?>
</head>
<body class="login-bg">
<section id="title">
        <header>
          <!-- Nav Bar -->
          <nav class="navbar navbar-expand-lg navbar-dark">
              <div class="container-fluid logo">
              <img src="images/kumpas.png" class="kumpas" alt="kumpas">
              <h2>Kumpas</h2>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
                <ul class="navbar-nav navigation-bar">
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about-section">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="registration.php">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>
  </section>
    <div class="login-row">
      <div class="col header">
        <center>
          <h1 class="login-header">WELCOME TO KUMPAS</h1>
          <p class="login-subheader"><b>Let Your Voice Be Heard</b></p>
        </center>
      </div>
      <div class="col form">
        <div class="login-form">
          <img src="images/avatar.png" alt="avatar.png" class="user">
          <center><h2>Administrator</h2></center>
          <form id="registration" action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="POST">
            <label for="loginid" class="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="loginusername" class="loginid" required>
            <br>
            <br>
            <label for="loginpassword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="loginpassword" class="loginpassword" required>
            <br>
            <br>
            <button type="login" class="login" value="login" name="login">Login</button>
          </form>
          <hr>
          <center><a href="password.php" class="password">Forgotten Password?</a></center>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['login'])){
      if ($LoginError == ""){
      
        $conn=mysqli_connect('localhost','root','','user');
        if($conn==false){
            ("Connection Failed: " .mysqli_connect_error());
        }
      if ($results){
        echo "<script>window.location.href='admin.php';</script>";
      }
      }
      else{
        echo '<script>alert("Invalid Login Credentials!")</script>';
      }
    }
    ?>
</body>
</html>
