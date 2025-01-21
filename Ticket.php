<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Form with Tickets</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
    <style type="text/css">
      .form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;

}
    </style>
   
</head>
    
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
        <br><br><br><br>

<body id="form">
    <div class="form-container">
        <h2>Event Ticket Booking</h2>
        <form id="ticketForm">
            <div class="form-group">
                
                <input type="text" id="name" name="name" required placeholder="Name">
            </div>
            <div class="form-group">
                
                <input type="tel" id="phone" name="phone" required placeholder="Phone">
            </div>
            <div class="form-group">
                
                <input type="number" id="ticketNumber" name="ticketNumber" min="1" required placeholder="Number of Tickets">
            </div>
            <div class="form-group">
                
                <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number" required>
            </div>
            <button type="button" class="btn" id="addToCart">Add to Card</button>
        </form>
        
    </div>
    
</body>
</html>
