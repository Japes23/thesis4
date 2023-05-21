<?php
session_start();
$conn=mysqli_connect('localhost','root','','user');
    if($conn==false){
        ("Connection Failed: " .mysqli_connect_error());
}

$sql = 'SELECT * FROM users';
$results = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpas</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
  <!--CSS Link-->
  <link rel="stylesheet" href="styles.css">
  
  <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>

</head> 
<body class='profile'>
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
                    <a class="nav-link active" href="user_home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="adminlogin.php">Logout</a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>
    </section>
    <table border="1px" align="center" class="admintable">
    <thead>
        <tr>
            <th class="admin-font" width="50px">USERID</th>
            <th class="admin-font" width="120px">LAST NAME</th>
            <th class="admin-font" width="120px">FIRST NAME</th>
            <th class="admin-font" width="120px">MIDDLE NAME</th>
            <th class="admin-font" width="90px">BIRTHDAY</th>
            <th class="admin-font" width="120px">EMAIL</th>
            <th class="admin-font" width="100px">CONTACT NUMBER</th>
            <th class="admin-font" width="90px">ACTION</th>
        </tr>
    </thead>
    <?php 
    while ($rows = mysqli_fetch_array($results)){
      $fieldname1=$rows['USERID']; 
      $fieldname2=$rows['LAST_NAME'];
      $fieldname3=$rows['FIRST_NAME'];
      $fieldname4=$rows['MIDDLE_NAME'];
      $fieldname5=$rows['BIRTHDAY'];
      $fieldname6=$rows['EMAIL'];
      $fieldname7=$rows['CONTACT_NUM'];
    
    echo 
        '<tr>
          <td>'.$fieldname1.'</td>
          <td>'.$fieldname2.'</td>
          <td>'.$fieldname3.'</td>
          <td>'.$fieldname4.'</td>
          <td>'.$fieldname5.'</td>
          <td>'.$fieldname6.'</td>
          <td>'.$fieldname7.'</td>
          <td><button type="button" class="btn btn-success update-btn" value="'.$fieldname1.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>';
    }
    $conn=mysqli_connect('localhost','root','','user');
    $sql2 = "SELECT * FROM users WHERE USERID=$fieldname1";
    $results2=mysqli_query($conn,$sql2);
    $userid=mysqli_fetch_array($results2);
    if($conn==false){
      ("Connection Failed: " .mysqli_connect_error());
    }
    if(isset($_POST['update'])){
        if ($results){
          echo "<script>window.location.href='admin.php';</script>";
        }
    }
    
    ?>
    </table>


    <center>
    <button onClick="loginpageFunction()" class='reportBtn' style="margin: 25px 0px 20px 0px;">Go Back to Login Page</button>
        <script>
            function loginpageFunction(){
                window.location.href="adminlogin.php";
            }
        </script>
    </center>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="POST">
            <div class="row">
                <div class="col-lg-6">
                <label for="recipient-name" class="col-form-label">LAST NAME </label>        
                <input style='display: inline-block;'class="form-control" value="<?php echo $userid['LAST_NAME']?>" ><span id="test"></span></input>
                </div>
                <div class="col-lg-6">
                <label for="recipient-name" class="col-form-label">FIRST NAME </label>        
                <input style='display: inline-block;'class="form-control" value="<?php echo $userid['FIRST_NAME']?>" style='padding-left: 10px'><span id="test"></span></input>
                </div>
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">MIDDLE NAME </label>        
            <input style='display: inline-block; margin: 5px;'class="form-control" value="<?php echo $userid['MIDDLE_NAME']?>"><span id="test"></span></input>
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">BIRTHDAY </label>        
            <input type="date" name="birthday" value="<?php echo $userid['BIRTHDAY']?>" id="birthday" required>
            </div>
            <div class="row">
                <div class="col-lg-6">
                <label for="recipient-name" class="col-form-label">EMAIL</label>        
                <input style='display: inline-block;'class="form-control" value="<?php echo $userid['EMAIL']?>"><span id="test"></span></input>
                </div>
                <div class="col-lg-6">
                <label for="message-text" class="col-form-label">CONTACT NUMBER</label>
                <input type="number" name="Update"class="form-control" value="<?php echo $userid['CONTACT_NUM']?>" id="message-text"></input>
                </div>
            </div>            
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary dismiss" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" value="update" name="update" id="update">UPDATE</button>
      </div>
    </div>
  </div>
  </form>
</div>
</body>
</html>
