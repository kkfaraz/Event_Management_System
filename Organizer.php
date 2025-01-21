<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style type="text/css">

        textarea {
            width: 100%;
        }


        .organizer-categories ul {
            list-style: none;
            padding: 0;
        }

        .organizer-categories li {
            margin-bottom: 10px;
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .containerDelete {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            height: 100vh;


        }

        .form-containerDelete {
            background-color: #fff;
            background: rgba(0, 0, 0, 0.5);
            position:initial;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 20px;
            max-width: 500px;
        }

        .container{
            height: 85vh;
        }
        .form-container select{
            width: 100%;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
        }

       .form-container #eventDescription{
            width: 100%;
            font-size: 15px;
            font-weight: bold;
            
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
                <h3>WLCOME TO OUR WEBSITE <br><span>event organizer</span></h3>
            </div>


            <div class="container">
        <div class="form-container">
            <h2>Create or Update Event</h2>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <h3>Select Event Category</h3>
                <select name="Category" id="Category">
                <?php 
                    include 'connect.php';
                    $sql = "SELECT CATEGERY_ID, CATEGERY_NAME FROM event_categery";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["CATEGERY_ID"] . "'>" . $row["CATEGERY_ID"]."-" .$row["CATEGERY_NAME"]. "</option>";
                            }
                        } else {
                            echo "<option value=''>No event categories found</option>";
                        }
                    } 
                ?>
            </select><br><br>
                <input type="number" name="eventId" placeholder="Event ID">
                <input type="text" id="eventName" name="eventName" required placeholder="Event Name">
                <input type="date" id="eventDate" name="eventDate" required>
                <input type="time" id="eventTime" name="eventTime" required>
                <input type="text" id="eventLocation" name="eventLocation" required placeholder="Location">
                <textarea id="eventDescription" name="eventDescription" required placeholder="Description"></textarea><br><br>
                <button type="submit" name="createUpdateEvent">Submit</button>
            </form>
            
        </div>
        
    </div>

<!-- Add create Update Event -->

<?php
    
    include 'connect.php';

if (isset($_POST['createUpdateEvent'])) {
    $category = $_POST['Category'];
    $eventId = $_POST['eventId'];
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $eventLocation = $_POST['eventLocation'];
    $eventDescription = $_POST['eventDescription'];

    if (empty('Category')) {
    }
    else {
        $category = trim($_POST['Category']);
    }
    if (empty('eventId')) {
    }
    else {
        $eventId = trim($_POST['eventId']);
    }

    if (empty('eventName')) {
    }
    else {
        $eventName = trim($_POST['eventName']);
    }
    if (empty('eventDate')) {
    }
    else {
        $eventDate = trim($_POST['eventDate']);
    }
    if (empty('eventTime')) {
    }
    else {
        $eventTime = trim($_POST['eventTime']);
    }
    if (empty('eventLocation')) {
    }
    else {
        $eventLocation = trim($_POST['eventLocation']);
    }
    if (empty('eventDescription')) {
    }
    else {
        $eventDescription = trim($_POST['eventDescription']);
    }

if (empty($category) || empty($eventName) || empty($eventDate) || empty($eventTime) || empty($eventLocation) || empty($eventDescription)) {
            
            echo "<br>Couldn't insert data because of missing fields!!";

        }else {


            $sql =  "Insert Into event (EVENT_NAME,EVENT_LOCATION,EVENT_DESCRIPTION,CATEGERY_ID)

                    Values ('$eventName', '$eventLocation', '$eventDescription', $category)";
            $sql_time =  "Insert Into event_datetime (EVENT_DATETIME_TIME,EVENT_DATETIME_DATE)

                    Values ('$eventTime', '$eventDate')";       

            if ($conn->query($sql) === TRUE && $conn->query($sql_time) === TRUE) {
                    
                echo "<p style='color:green; font-family:verdana;font-size:15px;text-align: center;background-color: white;'>Event Add Successfully</p><br>";

            } else {

                echo "Error in inserting table data <br>" . $conn->error;
            }
    
        }//inner-if



    } else {

        
    }//outer-if


    $conn->close();


?>

<!-- 2 -->

    <div class="containerDelete">
        <div class="form-containerDelete">
            <h2>Change or Delete Event</h2>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <input type="number" name="eventId" placeholder="Event ID">
                <input type="text" id="eventName" name="eventName" placeholder="Event Name">
                <button type="submit" name="ChangeEventName">Change Event Name</button><br><br>
                <input type="date" id="eventDate" name="eventDate">
                <button type="submit" name="ChangeEventDate">Change Event Date</button><br><br>
                <input type="time" id="eventTime" name="eventTime">
                <button type="submit" name="ChangeEventTime">Change Event Time</button><br><br>
                <input type="text" id="eventLocation" name="eventLocation" placeholder="Location"><button type="submit" name="ChangeEventLocation">Change Event Location</button><br><br>
                <textarea id="eventDescription" name="eventDescription" placeholder="Description"></textarea><br><br>"><button type="submit" name="ChangeEventDescription">Change Event Description</button><br><br>
                <button type="submit" name="ChangeDeleteEvent">Submit</button>
            </form>
            
        </div>
        
    </div>


    <!-- Add eventName -->

<?php 
include 'connect.php';


    if (isset($_POST['ChangeEventName'])) {
         $eventId = $_POST['eventId'];
        $eventName = $_POST['eventName'];
                    $sql_Name = "UPDATE event SET event_name = '$eventName' WHERE event_Id = '$eventId';";
                    if ($conn->query($sql_Name) === TRUE){
                        echo "<p style='color:green; font-family:verdana;font-size:10px;text-align: center;background-color: white;'>Update Event Name Successfully</p><br>";
                    }
                     else {

                        echo "Error Updating data <br>" . $conn->error;
                    }
                }

 ?>


<!-- 5 -->

<?php 
include 'connect.php';

    

    if (isset($_POST['ChangeEventDate'])) {
        $eventId = $_POST['eventId'];
        $eventDate = $_POST['eventDate'];
                    $sql_Name = "UPDATE event_datetime SET  EVENT_DATETIME_DATE  = '$eventDate' WHERE event_Id = '$eventId';";
                    if ($conn->query($sql_Name) === TRUE){
                        echo "<p style='color:green; font-family:verdana;font-size:10px;text-align: center;background-color: white;'>Update Event Date Successfully</p><br>";
                    }
                     else {

                        echo "Error Updating data <br>" . $conn->error;
                    }
                }

 ?>

<!-- 6 -->

<?php 
include 'connect.php';

    

    if (isset($_POST['ChangeEventTime'])) {
        $eventId = $_POST['eventId'];
        $eventTime = $_POST['eventTime'];
                    $sql_Name = "UPDATE event_datetime SET  EVENT_DATETIME_TIME  = '$eventTime' WHERE event_Id = '$eventId';";
                    if ($conn->query($sql_Name) === TRUE){
                        echo "<p style='color:green; font-family:verdana;font-size:10px;text-align: center;background-color: white;'>Update Event Time Successfully</p><br>";
                    }
                     else {

                        echo "Error Updating data <br>" . $conn->error;
                    }
                }

 ?>
<!-- 7 -->

<?php 
include 'connect.php';

    

    if (isset($_POST['ChangeEventTime'])) {
        $eventId = $_POST['eventId'];
        $eventLocation = $_POST['eventLocation'];
                    $sql_Name = "UPDATE event SET  EVENT_LOCATION  = '$eventLocation' WHERE event_Id = '$eventId';";
                    if ($conn->query($sql_Name) === TRUE){
                        echo "<p style='color:green; font-family:verdana;font-size:10px;text-align: center;background-color: white;'>Update Event Location Successfully</p><br>";
                    }
                     else {

                        echo "Error Updating data <br>" . $conn->error;
                    }
                }

 ?>

<!-- 8 -->

<?php 
include 'connect.php';

    

    if (isset($_POST['ChangeEventTime'])) {
        $eventId = $_POST['eventId'];
        $eventDescription = $_POST['eventDescription'];
                    $sql_Name = "UPDATE event SET  EVENT_DESCRIPTION  = '$eventDescription' WHERE event_Id = '$eventId';";
                    if ($conn->query($sql_Name) === TRUE){
                        echo "<p style='color:green; font-family:verdana;font-size:10px;text-align: center;background-color: white;'>Update Event Description Successfully</p><br>";
                    }
                     else {

                        echo "Error Updating data <br>" . $conn->error;
                    }
                }

 ?>

    <!-- 3 -->

     <div class="container">
        <div class="form-container">
            <h2>Add Event Category</h2>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <input type="text" id="eventName" name="eventName" required placeholder="Event Name">
                <input type="date" id="eventDate" name="eventDate" >
                <button type="submit" name="event_Category">Add Category</button>
            </form>
            <h2>View Event Categories</h2>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <button type="submit" name="View">view</button>
            </form>
        </div>
        
        <!-- Add Event -->
<?php 
include 'connect.php';

    

    if (isset($_POST['event_Category'])) {
        $eventName = $_POST['eventName'];
        
                    $sql_Name = "INSERT INTO event_categery (CATEGERY_NAME) VALUES('eventName')";
                    if ($conn->query($sql_Name) === TRUE){
                        echo "<p style='color:green; font-family:verdana;font-size:15px;text-align: center;background-color: white;'>Add Event Category Successfully</p><br>";
                    }
                     else {

                        echo "Error Updating data <br>" . $conn->error;
                    }
                }

 ?>

<!-- view category -->
<?php
include 'connect.php';

if (isset($_POST['View'])) {
    $sql = "SELECT CATEGERY_ID, CATEGERY_NAME FROM event_categery";
    $result = $conn->query($sql);
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<div style=margin-top:0%;content-align:center;background:rgba(0,0,0,0.7);><h2 style=padding:10px>Event Categories:</h2>";
        echo "<div style=width:300px;padding:10px;><ol type=circle; style= color:white;font-size:15px>";
        while ($row = $result->fetch_assoc()) {
            echo "<h3>".$row["CATEGERY_ID"] .": ". $row["CATEGERY_NAME"] . "<h3>";
        }
        echo "</ol></div>";
        echo "</div>";
    } else {
        echo "No event categories found.";
    } 
}
    
}
?>
    
</body>
</html>



