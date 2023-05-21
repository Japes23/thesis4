<?php
  session_start();
  $conn=mysqli_connect('localhost','root','','test1');
  if($conn==false){
     ("Connection Failed: " .mysqli_connect_error());
  }
  $sql4 = "SELECT letter FROM letterdata ORDER BY LETTER_ID DESC LIMIT 1 ";
  $results4 = mysqli_query($conn,$sql4);
  $input = mysqli_fetch_array($results4);
  $letterinput = $input['letter'];
  $conn=mysqli_connect('localhost','root','','user');
  if($conn==false){
      ("Connection Failed: " .mysqli_connect_error());
  }
  $userid = $_SESSION['userid'];
  $sql5 = "SELECT * FROM letters WHERE USERID = $userid";
  if (isset($_POST['update'])) {
  $letterss = $_SESSION['letterID'];
  }

  
  $sql2 = "SELECT USERNAME FROM users WHERE USERID = $userid";
  $results2 = mysqli_query($conn,$sql2);
  $username = mysqli_fetch_array($results2);
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
<body class="app-body">
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
                    <a class="nav-link" href="user_home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="user.php">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>
    </section>
    <section id="sign-language">
      <div class = "head-title">
        <center><h1>Welcome <?php echo $username['USERNAME']?>!</h1></center>
      </div>
        <div id="link_wrapper">
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h3 class="table-title">List of Pre-Configured Phrases</h3>
    <?php 
    $conn=mysqli_connect('localhost','root','','user');
    if($conn==false){
        ("Connection Failed: " .mysqli_connect_error());
    }
    $sql = "SELECT A, B, C, D, E, F, G, H, I, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y FROM `letters` WHERE USERID='$userid'";
    $query = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_array($query)){
      $fieldname1=$rows['A'];
      $fieldname2=$rows['B'];
      $fieldname3=$rows['C'];
      $fieldname4=$rows['D'];
      $fieldname5=$rows['E'];
      $fieldname6=$rows['F'];
      $fieldname7=$rows['G'];
      $fieldname8=$rows['H'];
      $fieldname9=$rows['I'];
      $fieldname10=$rows['K'];
      $fieldname11=$rows['L'];
      $fieldname12=$rows['M'];
      $fieldname13=$rows['N'];
      $fieldname14=$rows['O'];
      $fieldname15=$rows['P'];
      $fieldname16=$rows['Q'];
      $fieldname17=$rows['R'];
      $fieldname18=$rows['S'];
      $fieldname19=$rows['T'];
      $fieldname20=$rows['U'];
      $fieldname21=$rows['V'];
      $fieldname22=$rows['W'];
      $fieldname23=$rows['X'];
      $fieldname24=$rows['Y'];
    ?>
    <body>
    <div class="row">
      <div class="col-lg-6">
      <table border="1px" align="center" class="tableone">
    <thead width="150px">
        <tr>
            <th width="100px">Letter</th>
            <th>Phrase</th> 
            <th width="130px">Action</th>
        </tr>
    </thead>
    <?php
    echo 
    '<thead>
        <tr>
          <td>A</td>
          <td>'.$fieldname1.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="A" onclick="sendButtonId(this.id)" value="'.$fieldname1.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>B</td>
          <td>'.$fieldname2.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="B" onclick="sendButtonId(this.id)" value="'.$fieldname2.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>C</td>
          <td>'.$fieldname3.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="C" onclick="sendButtonId(this.id)" value="'.$fieldname3.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>D</td>
          <td>'.$fieldname4.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="D" onclick="sendButtonId(this.id)" value="'.$fieldname4.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>E</td>
          <td>'.$fieldname5.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="E" onclick="sendButtonId(this.id)" value="'.$fieldname5.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>F</td>
          <td>'.$fieldname6.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="F" onclick="sendButtonId(this.id)" value="'.$fieldname6.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>G</td>
          <td>'.$fieldname7.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="G" onclick="sendButtonId(this.id)" value="'.$fieldname7.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>H</td>
          <td>'.$fieldname8.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="H" onclick="sendButtonId(this.id)" value="'.$fieldname8.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>I</td>
          <td>'.$fieldname9.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="I" onclick="sendButtonId(this.id)" value="'.$fieldname9.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>K</td>
          <td>'.$fieldname10.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="K" onclick="sendButtonId(this.id)" value="'.$fieldname10.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>L</td>
          <td>'.$fieldname11.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="L" onclick="sendButtonId(this.id)" value="'.$fieldname11.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>M</td>
          <td>'.$fieldname12.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="M" onclick="sendButtonId(this.id)" value="'.$fieldname12.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
      </table>
      </div>
      <div class="col-lg-6">
      <table border="1px" align="center" class="tabletwo">
      <thead width="150px">
        <tr>
            <th width="100px">Letter</th>
            <th>Phrase</th> 
            <th width="130px">Action</th>
        </tr>
      </thead>
        <tr>
          <td>N</td>
          <td>'.$fieldname13.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="N" onclick="sendButtonId(this.id)" value="'.$fieldname13.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>O</td>
          <td>'.$fieldname14.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="O" onclick="sendButtonId(this.id)" value="'.$fieldname14.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>P</td>
          <td>'.$fieldname15.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="P" onclick="sendButtonId(this.id)" value="'.$fieldname15.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>Q</td>
          <td>'.$fieldname16.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="Q" onclick="sendButtonId(this.id)" value="'.$fieldname16.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>R</td>
          <td>'.$fieldname17.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="R" onclick="sendButtonId(this.id)" value="'.$fieldname17.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>S</td>
          <td>'.$fieldname18.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="S" onclick="sendButtonId(this.id)" value="'.$fieldname18.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>T</td>
          <td>'.$fieldname19.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="T" onclick="sendButtonId(this.id)" value="'.$fieldname19.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>U</td>
          <td>'.$fieldname20.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="U" onclick="sendButtonId(this.id)" value="'.$fieldname20.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>V</td>
          <td>'.$fieldname21.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="V" onclick="sendButtonId(this.id)" value="'.$fieldname21.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>W</td>
          <td>'.$fieldname22.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="W" onclick="sendButtonId(this.id)" value="'.$fieldname22.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>X</td>
          <td>'.$fieldname23.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="X" onclick="sendButtonId(this.id)"  value="'.$fieldname23.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
        <tr>
          <td>Y</td>
          <td>'.$fieldname24.'</td>
          <td><button type="button" class="btn btn-success update-btn" id="Y" onclick="sendButtonId(this.id)" value="'.$fieldname24.'" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UPDATE</button></td>
        </tr>
    </thead>
    </table>
    </div>
    </div>
    <br>';
    }
    ?>
    <script type="text/javascript">
    $(document).ready(function() {
    $(".btn").click(function() {
    var buttonValue = $(this).val();
    $.ajax({
      type: "POST",
      url: "process.php",
      data: {buttonValue:buttonValue},
      success: function(response) {
      } 
    })
    .done(function(data){
      $("#test").html(data);
    });
  });
});
</script>

<script>
function sendButtonId(buttonId) {
       var buttonID = buttonId;
      $.ajax({
        url: "id.php",
        type: "POST",
        data: {buttonId:buttonID },
        success: function(response) {
          console.log(response);
        }
      })
      .done(function(data){
      $("#message-text").html(data);
    });
    };
  </script>
<?php
  $conn=mysqli_connect('localhost','root','','user');
  if($conn==false){
      ("Connection Failed: " .mysqli_connect_error());
  }
  if (isset($_POST['submit'])){
  }
  if(isset($_POST['update'])){
    $updatephrase = $_POST['Update'];
    $sql3 = "UPDATE letters SET $letterss='$updatephrase' WHERE USERID=$userid";
    $results3=mysqli_query($conn,$sql3);
    if($results3){
      echo '<script>alert("Updated Successfully!")</script>';
      echo("<script>window.location.href='user.php';</script>");
    }
  }
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Current Phrase: </label>        
            <h4 style='display: inline-block; margin: 5px;'class="form-control" ><span id="test"></span></h4>
            </div>
            <div class="mb-3">
            <label for="message-text" class="col-form-label">New Phrase</label>
            <textarea type="text" name="Update"class="form-control" id="message"></textarea>
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
</html>
<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php", true);
  xhttp.send();
}
setInterval(function(){
  loadXMLDoc();
}, 1000);
window.onload = loadXMLDoc();
</script>