<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        
    <header class="header">
            <a href="#" class="logo"><span>E</span>vent <span>M</span>anagement <span>S</span>ystem</a>
            <nav class="navbar">
                <a href="visit.php" class="logo">SHORT VISIT TO WEBSITE</a>
                <a href="#service"></a>
                <a href="#about"></a>
                <a href="#gallery"></a>
                <a href="#price"></a>
                <a href="#contact"></a>
                <a href="#review"></a>
            </nav>

        </header>

        <!-- home section starts -->
        <section class="home" id="home">
            <div class="content">
                <h3>Its time to celebrate the best <br><span>event organizer</span></h3>
            </div>

    <div class="container">
       
        <div class="form-container">
            <h2>Sign Up</h2>
            <form id="signup-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="signUp">Sign Up</button>
            </form>
            <br><br><br>
            <h3><b>Or</b></h3>
            <a href="https://accounts.google.com" class="google-sign-in">
                <img src="Pics\googleLogo.png" alt="Google Logo" class="google-logo">
                Sign up with Google
            </a>
            <h3><b>If you have already login then click here</b></h3>
            <a href="login.php">Login</a>
        </div>
    </div>

</body>
</html>



<?php

include 'connect.php';

if (isset($_POST['signUp'])) {


        if (empty($_POST['name'])  ){
            echo "Please enter name first!<br>";
        }  else {
            $name = trim($_POST['name']);
        }


        if (empty($_POST['email']) ){
            echo "Please enter email first!<br>";
        }  else {
            $email = trim($_POST['email']);
        }



        if (empty($_POST['password']) ) {
            echo "Please enter the password first!<br>";
        }  else {
            $password = trim($_POST['password']);
        }

        if (empty($name) || empty($email) || empty($password) ) {
            
            echo "<br>Couldn't insert data because of missing fields!!";

        }else {


            $sql =  "Insert Into users (User_name,User_email,User_password)

                    Values ('$name', '$email', '$password')";


            if ($conn->query($sql) === TRUE) {
                    
                echo "<p style='color:green; font-family:verdana;font-size:15px;text-align: center;background-color: white; margin-left: 38%; margin-right: 38%;float: left'>You are Registered Successfully</p><br>";
                header("location:login.php");

            } else {

                echo "Error in inserting table data <br>" . $conn->error;
            }
    
        }//inner-if



    } else {

        echo "Please enter the book first!";
    }//outer-if


    $conn->close();


?>
