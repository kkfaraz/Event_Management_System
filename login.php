<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            <h2>Login as Organizer</h2>
            <form id="login-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="Organlogin">Login</button>
            </form>
            <h3><b>Or</b></h3>
            
            <h3><b>If you have not login then click here</b></h3>
            <a href="signUp.php">Sign Up</a>
        </div>
        
    </div>


    <?php
    
    include 'connect.php';

if (isset($_POST['Organlogin'])) {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];


if (empty($Name) || empty($Email) || empty($Password)) {
            
            echo "<br>Couldn't insert data because of missing fields!!";

        }else {

                $sql = "SELECT * FROM users WHERE User_Email = '$formEmail'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                //to get data from database
                $email = $row["User_Email"];
                $pass = $row["User_PassWord"];
                
                if ($formEmail == $email && $password == $pass) {

                    $sql =  "Insert Into event_organizer(ORGANIZER_NAME,email,User_Id)

                    Values ('$Name', '$Email', $category)";
            
            if ($conn->query($sql) === TRUE) {
                    
                echo "<p style='color:green; font-family:verdana;font-size:15px;text-align: center;background-color: white;'>Organizer Add Successfully</p><br>";

            } else {

                echo "Error in inserting table data <br>" . $conn->error;
            }

                }
            
    
        }//inner-if



    } else {

        echo "Please enter all fields first!";
    }//outer-if


    $conn->close();


?>

    <!-- 2 -->


    <div class="container">
        <div class="form-container">
            <h2>Login as Vendor</h2>
            <form id="login-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="Venlogin">Login</button>
            </form><br>
            <h3><b>Or</b></h3>
            
            <h3><b>If you have not login then click here</b></h3>
            <a href="signUp.php">Sign Up</a>
        </div>
        
    </div>

    <!-- 3 -->


    <div class="container">
        <div class="form-container">
            <h2>Login as Participant</h2>
            <form id="login-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="Partlogin">Login</button>
            </form>
            <h3><b>Or</b></h3>
            
            <h3><b>If you have not login then click here</b></h3>
            <a href="signUp.php">Sign Up</a>
        </div>
        
    </div>

</body>
</html>



<?php 

    include 'connect.php';

    if(isset($_POST['Organlogin'])) { 

        $formEmail = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE User_Email = '$formEmail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //to get data from database
        $email = $row["User_Email"];
        $pass = $row["User_PassWord"];
        
        if ($formEmail == $email && $password == $pass) {

            header("Location: Organizer.php");

        } else {

            echo "<p style='color:red; font-family:verdana;font-size:15px;text-align: center;background-color: white; margin-left: 38%; margin-right: 38%;float: left'>email or password is incorrect!</p>";


        }//if

 
    }//outer-if

    if(isset($_POST['Venlogin'])) { 


        $sql = "SELECT * FROM users WHERE User_Email = '$formEmail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //to get data from database
        $email = $row["User_Email"];
        $pass = $row["User_PassWord"];
        
        if ($formEmail == $email && $password == $pass) {

            header("Location: Vendor.php");

        } else {

            echo "<p style='color:red; font-family:verdana;font-size:15px;text-align: center;background-color: white; margin-left: 38%; margin-right: 38%;float: left'>email or password is incorrect!</p>";


        }//if

 
    }//outer-if

    if(isset($_POST['Partlogin'])) { 


        $sql = "SELECT * FROM users WHERE User_Email = '$formEmail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //to get data from database
        $email = $row["User_Email"];
        $pass = $row["User_PassWord"];
        
        if ($formEmail == $email && $password == $pass) {

            header("Location: Participant.php");

        } else {

            echo "<p style='color:red; font-family:verdana;font-size:15px;text-align: center;background-color: white; margin-left: 38%; margin-right: 38%;float: left'>email or password is incorrect!</p>";


        }//if

 
    }//outer-if



    
 ?>