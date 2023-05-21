<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c1bce45b9f.js" crossorigin="anonymous"></script>
    <!--CSS Link-->
    <link rel="stylesheet" href="styles2.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>

<?php
    $conn=mysqli_connect('localhost','root','','user');
    if($conn==false){
        ("Connection Failed: " .mysqli_connect_error());
    }
    $LastNameInvalid="";
    $FirstNameInvalid="";
    $MiddleNameInvalid="";
    $ErrMsgnumber="";
    $mobilelenError="";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!preg_match("/^[a-zA-z- ]*$/", $_POST['lastName'])){ 
            $LastNameInvalid = "*Only alphabets and whitespace are allowed!<br>"; 
        }
        if (!preg_match("/^[a-zA-z- ]*$/", $_POST['firstName'])){
            $FirstNameInvalid = "*Only alphabets and whitespace are allowed!<br>"; 
        }
        if (!preg_match("/^[a-zA-z- ]*$/", $_POST['middleName'])){
            $MiddleNameInvalid = "*Only alphabets and whitespace are allowed!<br>"; 
        }
        if ((!preg_match ("/^[0-9]*$/", $_POST['phoneNumber']))){ 
            $ErrMsgnumber = "*Only numeric value is allowed!<br>"; 
        }
        if (strlen($_POST['phoneNumber'])!=11){
            $mobilelenError = "*Mobile number should be 11 digits!<br>";
        }
    }
?>

<body>
    
    
    <div class="container">
        <h1 class="form-title">Registration</h1>
        <form id="registration-form" action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="POST">
            <h2 class="personal">Personal Details</h2>
            <div class="row main-personal-info">
                <div class="col user-input-box">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required/>
                    <span class='name-error'><?php echo $LastNameInvalid?></span>
                </div>

                <div class="col user-input-box">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required/>
                    <span class='name-error'><?php echo $FirstNameInvalid?></span>
                </div>
                <div class="col user-input-box">
                    <label for="middleName" id="label-middle">Middle Name</label>
                    <input type="text" name="middleName" id="middleName" placeholder="Enter Middle Name" required/>
                    <span class='name-error'><?php echo $MiddleNameInvalid?></span>
                </div>
                </div>
            <div class="row">
                <div class="col birthday">
                    <span id="birthday-detail">Birthday</span><br>
                    <input type="date" name="birthday" id="birthday" required>
                </div>
                <div class="col gender-details-box">
                    <span class="gender-detail">Gender</span>
                    <div class="gender-category">
                        <input type="radio" name="gender" id="male" value="Male" />
                        <label for="Male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female" />
                        <label for="Female">Female</label>
                    </div>
                </div>
            </div>
            <h2 class="contact">Contact Details</h2>
            <div class="row main-contact-info">
                <div class="user-input-box">
                    <label for="username">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email address"/>
                </div>

                <div class="user-input-box">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter Phone Number" maxlength="11" required/>
                    <span><?php echo $mobilelenError?></span>
                    <span><?php echo $ErrMsgnumber?></span>
                </div>
            </div>
            <button class="form-submit-btn" value="submit" name="submit" id="submit">Submit</button>
            <a class="home-btn" href="index.html">Home</a>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        if ($LastNameInvalid=="" && $FirstNameInvalid=="" && $MiddleNameInvalid=="" && $ErrMsgnumber=="" && $mobilelenError==""){
            $conn=mysqli_connect('localhost','root','','user');
            if($conn==false){
                ("Connection Failed: " .mysqli_connect_error());
            }

        $lastName=$_POST['lastName'];
        $firstName=$_POST['firstName'];
        $middleName=$_POST['middleName'];
        $birthday=$_POST['birthday'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $contactnumber=$_POST['phoneNumber'];

        $sql = "INSERT INTO users (LAST_NAME, FIRST_NAME, MIDDLE_NAME, BIRTHDAY, EMAIL, CONTACT_NUM)
        VALUES ('$lastName', '$firstName', '$middleName', '$birthday', '$email', '$contactnumber')";
        $results = mysqli_query($conn, $sql);
        if($results){
            echo("<script>window.location.href='successpage.php';</script>");
            exit();
        }
        else{
            echo "Error";
        }
        }
        else{
            echo '<script>alert("Fill up the form correctly!")</script>';
        }
    }
    ?>
</body>
</html>