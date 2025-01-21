<?php
include 'connect.php';

$userType = $_POST["userType"];
$eventType = $_POST["eventType"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

if (empty($userType)) {
    echo "Please select the user type first!<br>";
} else {
    $userType = trim($_POST['userType']);
}

if (empty($eventType)) {
    echo "Please select the event type first!<br>";
} else {
    $eventType = trim($_POST['eventType']);
}

if (empty($name)) {
    echo "Please enter name first!<br>";
}

if (empty($email)) {
    echo "Please enter email first!<br>";
}

if (empty($phone)) {
    echo "Please enter phone first!<br>";
}

if (!empty($userType) && !empty($eventType) && !empty($name) && !empty($email) && !empty($phone)) {

    if ($userType === 'Organizer') {
        $sql_user = "INSERT INTO event_organizer (organizer_name, email, phone) VALUES ('$name', '$email', '$phone')";
    } elseif ($userType === 'Participant') {
        $sql_user = "INSERT INTO Participant (Participant_name, email, phone) VALUES ('$name', '$email', '$phone')";
    } elseif ($userType === 'Vendor') {
        $sql_user = "INSERT INTO Vendor (Vendor_name, email, phone) VALUES ('$name', '$email', '$phone')";
    } else {
        echo "Invalid user type selected!!!<br>";
    }

    if ($eventType === 'Birthday' || $eventType === 'Wedding' || $eventType === 'Concert') {
        $sql_event = "INSERT INTO event_categery (categery_name) VALUES ('$eventType')";
    } else {
        echo "Invalid event type selected!!!<br>";
    }

    if (isset($sql_user) && isset($sql_event)) {
        if ($conn->query($sql_user) === TRUE && $conn->query($sql_event) === TRUE) {
            echo "New Records Added Successfully!<br>";
        } else {
            echo "Error in inserting table data <br>" . $conn->error;
        }
    }
}

$conn->close();
?>
