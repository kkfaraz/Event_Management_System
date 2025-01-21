

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Type Form</title>
</head>
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">

    <style type="text/css">
    	.container_organ {
    		display: flex;
		    flex-wrap: nowrap;
		    justify-content: center;
		    align-items: center;
		    height: 60vh;
		    float: left;


		    }

		    .form-container_organ {
		    	
		    background-color: #fff;
		    background: rgba(0, 0, 0, 0.5);
		    position: relative;
		    border: 1px solid #ccc;
		    padding: 20px;
		    padding-bottom: 40px;
		    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		    text-align: center;
		    margin: 0 20px;
		    max-width: 350px;
		    }

		    .container_vendor {
    		display: flex;
		    flex-wrap: nowrap;
		    justify-content: center;
		    align-items: center;
		    height: 60vh;

		    }

		    .form-container_vendor {
		    	
		    background-color: #fff;
		    background: rgba(0, 0, 0, 0.5);
		    position: relative;
		    border: 1px solid #ccc;
		    padding: 20px;
		    padding-bottom: 40px;
		    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		    text-align: center;
		    margin: 0 20px;
		    max-width: 700px;
		    }

		    .container_participant {
    		display: flex;
		    flex-wrap: nowrap;
		    justify-content: center;
		    align-items: center;
		    height: 60vh;
		    
		    }

		    .form-container_participant {
		    	
		    background-color: #fff;
		    background: rgba(0, 0, 0, 0.5);
		    position: relative;
		    border: 1px solid #ccc;
		   	padding: 20px;
		   	padding-bottom: 40px;
		    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		    text-align: center;
		    margin: 0 20px;
		    max-width: 700px;
		    }

		    /*.select {
		    	color: white;
		    	background: rgba(0, 0, 0, 0.5);
		    	border-radius: 5px;
		    	text-align: center;
		    	font-size: 15px;
		    }
		    .select:hover{
		    	color: #007bff;
		    	cursor: pointer;
		    }*/
		    h2 {
		    margin-bottom: 15px;
		    color:#007bff;
		    font-size: 40px;
			}
    </style>
<body>

		<header class="header">
            <a href="#" class="logo"><span>E</span>vent <span>M</span>anagement <span>S</span>ystem</a>
            <nav class="navbar">
                <a href="signUp.php" class="logo">Sign up</a>
                <a href="login.php" class="logo">Log Out</a>
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

    <div class="container_organ">
        <div class="form-container_organ">
            <h2>Login As Organizer</h2>
            <form id="login-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
            	<input type="text" name="name" placeholder="write Organizer in capital" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="Userlogin">Login</button>
            </form>
            
        </div>

    <div class="container_vendor">
        <div class="form-container_vendor">
            <h2>Login As <br>Vendor</h2>
            <form id="login-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
            	<input type="text" name="name" placeholder="write Vendor in capital" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="Userlogin">Login</button>
            </form>
            
        </div>    
        
    </div>

    <div class="container_participant">
        <div class="form-container_participant">
            <h2>Login As Participant</h2>
            <form id="login-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
            	<input type="text" name="name" placeholder="write Participant in capital" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required maxlength="16" minlength="8">
                <button type="submit" name="Userlogin">Login</button>
            </form>
            
        </div>    
        
    </div><br><br>




</body>
</html>


<?php 

    include 'connect.php';

if(isset($_POST['Userlogin'])) { 

		$name = $_POST['name'];
        $formEmail = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM users WHERE user_email = '$formEmail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //to get data from database

        $email = $row["User_email"];
        $pass = $row["User_password"];
        
        if ($name === 'ORGANIZER' && $formEmail == $email && $password == $pass) {
            header("Location: visit.php");
            exit();
        } elseif ($name === 'VENDOR' && $formEmail == $email && $password == $pass) {
            header("Location: visit.php");
            exit();
        } elseif ($name === 'PARTICIPANT' && $formEmail == $email && $password == $pass) {
            header("Location: visit.php");
            exit();
        } else {
            echo "<p style='color:red; font-family:verdana;background-color:white;'>Email or password is incorrect!</p>";
        }


        }//if
        
       

 
    //outer-if


    
 ?>