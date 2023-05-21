<?php
$serverName="LAPTOP-V6LGQ7P5\SQLEXPRESS";
$connectionOptions=[
"Database"=>"DLSU",
"Uid"=>"",
"PWD"=>""
];
$conn=sqlsrv_connect($serverName, $connectionOptions);
if($conn==false){
    die(print_r(sqlsrv_errors(),true));
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $UserNameError = "User Not Registered!";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $sql = "SELECT USERNAME FROM USERS WHERE USERNAME='$username'";
    $results=sqlsrv_query($conn,$sql);
    while ($datausername = sqlsrv_fetch_array($results)){
        if ($datausername['USERNAME'] == $username){
            $UserNameError = "";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
</head>
<body class="forgotpassword">
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
    <div class="card-container">
    <center><h1>Reset your Password</h1></center>
    <hr>
    <form id="registration" action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="POST">
    <div class="row">
        <div class="col-8 password-rst">
            <label for="loginid">Username:</label>
            <input type="text" placeholder="Enter Username" name="username" class="label-username" required>
            <br>
            <label for="password">New Password:</label><input type="password" id="password" name="password" class="label-pass" required><br>
            <label for="password2">Confirm Password:</label><input type="password" id="password2" name="password2" class="label-pass" required><br>
            <center><input type="submit" name="submit" value="Update Password" class="btn btn-primary btn-lg password-btn"></center>
        </div>
        <div class="col-4">
            <img class="password-reset" src="images/password-reset.png" alt="password-rest.png">
        </div>
    </div>
    </form>
    </div>
    <?php
    if(isset($_POST['submit'])) {  
        if($password==$password2 && $UserNameError==""){
            $serverName="LAPTOP-V6LGQ7P5\SQLEXPRESS";
            $connectionOptions=[
                "Database"=>"DLSU",
                "Uid"=>"",
                "PWD"=>""
            ];
            $conn=sqlsrv_connect($serverName, $connectionOptions);
            if($conn==false){
                die(print_r(sqlsrv_errors(),true));
            }
            $passwordhash=md5($password);

            $sql1 = "UPDATE USERS SET PASSWORD='$passwordhash' WHERE USERNAME='$username'";
            $results1=sqlsrv_query($conn,$sql1);
        
            if($results1){
            echo '<script>alert("Password Updated!")</script>';
            echo "<script>window.location.href='login.php';</script>";
            }
            }
        else{
            echo '<h3 class="user-error"><b>Username Not Registered!</b></h3>';
            }
        }
    ?>
</body>
</html>
