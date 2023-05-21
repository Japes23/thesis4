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
$userid = $_SESSION['userid'];
?>

<?php
$conn=mysqli_connect('localhost','root','','user');
if($conn==false){
   ("Connection Failed: " .mysqli_connect_error());
}
 $sql6 = "SELECT $letterinput AS LETTER FROM letters WHERE USERID = $userid";
 $results6 = mysqli_query($conn,$sql6);
 $column_name = mysqli_fetch_array($results6);
?>

<div class="row">
            <div class="col user-input">
                <div class="box-1">
                    <h1 class="output1">Sign Language Letter</h1>
                    <form id="input">
                    <input type="text" id="textfield" maxlength='1'; name="sign-language" value="<?php echo $input['letter'] ?>" readonly><br><br><br>
                    </form>
                    <img src="images/hand.png" class="hand" alt="hand.png">
                </div>
            </div>
            <div class="col">
                <img src="images/arrow.png" alt="arrow.png" class="arrow">
            </div>
            <div class="col output">
                <div class="box-2">
                    <h1 class="output1 output2">Output</h1>
                    <center>
                    <textarea type="text" id="result" name="sign-language" value="" readonly><?php echo $column_name['LETTER']?></textarea><br>
                    </center>
                    <img src="images/alphabet.png" class="alphabet" alt="alphabet.png">
                </div>
            </div>
        </div>

