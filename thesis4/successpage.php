<?php
    $conn=mysqli_connect('localhost','root','','user');
    if($conn==false){
        ("Connection Failed: " .mysqli_connect_error());
    }

    $sql = "SELECT USERID FROM users ORDER BY USERID DESC LIMIT 1";
    $results=mysqli_query($conn,$sql);
    $userid=mysqli_fetch_array($results);
    $id = $userid['USERID'];

?>

<DOCTYPE html>

    <html lang="en">
    <head>
    <link rel="stylesheet" href="success.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Successful</title>
        <!--CSS Link-->
        <link rel="stylesheet" href="styles.css">
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
    </head>
    
    <body class="form">
    <div class="success">
        <h2 align="center">Registration Successful</h2>
        <br>
        <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" align="center">
        <label>Complete your login credentials</label><br>
        <br>
        <label class="label" for="userid">Username:</label><input type="text" class="username" id="username" name="username" required><br> 
        <br>
        <label class="label" for="password">Password:</label><input type="password" id="password" name="password" required><br>
        <br>
        <label class="label" for="password2">Re-type Password:</label><input type="password" id="password2" name="password2" required><br>
        <br>
        <input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg"> 
        </form>
    <center>
    <?php

  
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }else{    
        $password = "";
    }
    if(isset($_POST['password2'])){
        $password2 = $_POST['password2'];
    }else{
        $password2 = "";
    }
    if(isset($_POST['submit'])) {  
        if($password==$password2){
            $conn=mysqli_connect('localhost','root','','user');
            if($conn==false){
                ("Connection Failed: " .mysqli_connect_error());
            }
            $useridstr=$userid['USERID'];
            $username=$_POST['username'];
            $passwordhash=md5($password);

            $sql1 = "UPDATE users SET USERNAME='$username', PASSWORD='$passwordhash' WHERE USERID=$useridstr";
            $results1=mysqli_query($conn,$sql1);
            $sql2 = "INSERT INTO `letters`(`USERID`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `K`, `L`, `M`, `N`, `O`, `P`, `Q`, `R`, `S`, `T`, `U`, `V`, `W`, `X`, `Y`)
            VALUES ('$id','Hello','Good Morning','Good Afternoon','How are you?','Thank you','I need Help','Goodbye','Okay','I am Hungry','Sorry','Lets Go','I am Thirsty','I am Sad','I love you','Yes','No','I am Fine','You are Beautiful','You are handsome','You are Kind','I am Scared','Danger!','I am Sad','I hate you!')";
            $results2=mysqli_query($conn,$sql2);
        
            if($results1 && $results2){
            echo '<script>alert("Login Created!")</script>';
            echo "<script>window.location.href='login.php';</script>";
            }
            else{
            echo '<h3 class="error"><b>Error Occured! Kindly repeat.</b></h3>';
            }
            }
            else{
                echo '<h3 class="error"><b>Password Did Not Match!</b></h3>';
            }
        }
?>
</center>
</div>
</body>
</html>