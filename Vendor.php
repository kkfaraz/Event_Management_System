<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        

#service-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

#service-form input[type="text"],
#service-form textarea,
#service-form input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#service-form button[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#service-form button[type="submit"]:hover {
    background-color: #007bff;
}
.form-container {
    width: 80%;
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.9);
    background: transparent;
    background-color: rgba(0, 0, 0, 0.7);
}

#product-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

#product-form input[type="text"],
#product-form textarea,
#product-form input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#product-form button[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#product-form button[type="submit"]:hover {
    background-color: #007bff;
}
label {
    font-weight: 500;
    font-size: 20px;
}

#product-form, #select, option {
    font-size: 15px;
    font-weight: bold;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
}

#service-form, #select, option {
    font-size: 15px;
    font-weight: bold;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
}

    </style>
</head>
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
                <h3>WLCOME TO OUR WEBSITE <br><span>event vendor</span></h3>
            </div><br><br>
    <header>
        <h2 style="text-align: center;font-weight: bolder;background-color: rgba(0, 0, 0, 0.7); margin-left: 27.5%;margin-right: 27.5%;border-radius: 5px;">About Product</h2>
    </header>

    <section class="form-container">
        <form id="product-form">
            <h2 style="color: #007bff;">Product Name</h2>
            <Select id = "select" name = "select">
                <option>Mobile Assessories</option>
                <option>Water Balls</option>
                <option>Fruit Salad</option>
                <option>Russian Salad</option>
                <option>Fast Food</option>
                <option>Crockry Items</option>
            </Select></br><br><br>

            <h2 style="color: #007bff;">Product Description</h2>
            <textarea id="product-description" name="product-description" required></textarea>


            <h2 style="color: #007bff;">Product Price</h2>
            <select id = "select" name = "select">
                <option>Mobile Assessories: $5~$30</option>
                <option>Water Balls: $0.5~$5</option>
                <option>Fruit Salad: $10~$25</option>
                <option>Russian Salad: $15~$35</option>
                <option>Fast Food: $5~$16</option>
                <option>Crockry Items: $50~$200</option>
            </select><br><br>
           

            <button type="submit" name="addProduct">Add Product</button>

            
        </form>
    </section><br>

    <!-- product -->

    <header>
        <h2 style="text-align: center; font-weight: bolder;background-color: rgba(0, 0, 0, 0.7); margin-left: 27.5%;margin-right: 27.5%;border-radius: 5px;">About Service</h2>
    </header>

    <section class="form-container">
        <form id="service-form">
            <h2 style="color: #007bff;">Service Name:</h2>
            <select id = "select" name = "selectName">
                <option>Waiter</option>
                <option>Catering</option>
                <option>Decoration and Floral Arrangements</option>
                <option>Transportation Services</option>
                <option>Audio-Visual Services</option>
                <option>Security Services</option>
            </select>
        </br></br></br>
            <h2 style="color: #007bff;">Service Price:</h2>
            <select id = "select" name = "selectPrice">
                <option>Waiter : $20/hr</option>
                <option>Catering: $100~$300</option>
                <option>Decoration and Floral Arrangements: $150~$500</option>
                <option>Transportation Services: $5/person</option>
                <option>Audio-Visual Services: $50~$300</option>
                <option>Security Services: $100~$1000</option>
            </select></br></br></br>

            <button type="submit" name="AddServices" id="AddServices">Add Service</button>
        </form>
    </section>
<?php

include 'connect.php';

if (isset($_POST['AddServices'])) {


        if (empty($_POST['selectName'])  ){
            echo "Please select name first!<br>";
        }  else {
            $name = trim($_POST['selectName']);
        }


        if (empty($_POST['selectPrice']) ){
            echo "Please select Price first!<br>";
        }  else {
            $price = trim($_POST['selectPrice']);
        }


        if (empty($name) || empty($price)) {
            
            echo "<br>Couldn't insert data because of missing fields!!";

        }else {


            $sql =  "Insert Into services (STREET_NAME,SERVICES_PRICE)

                    Values ('$name', '$price', )";


            if ($conn->query($sql) === TRUE) {
                    
                echo "<p style='color:green; font-family:verdana;font-size:15px;text-align: center;background-color: white; margin-left: 38%; margin-right: 38%;float: left'> Add SERVICES Successfully</p><br>";

            } else {

                echo "Error in inserting table data <br>" . $conn->error;
            }
    
        }//inner-if



    } //outer-if


    $conn->close();


?>

</body>
</html>
