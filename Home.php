


<?php 

    include 'connect.php';

    if(isset($_POST['submit'])) { 

        //to get login credentials from form
        $formEmail = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM participant WHERE email = '$formEmail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //to get data from database
        $email = $row["email"];
        $pass = $row["password"];
        
        if ($formEmail == $email && $password == $pass) {

            header("Location: visit.php");

        } else {

            echo "email or pass is incorrect!";


        }//if

 
    }//outer-if








 ?>