<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Participant\styles.css"> -->
    <title>Unique Form with Tickets</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        
    </style>
</head>

<body >

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

        </header><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="form">
    <div class="form-container" >
        <h2>Event Ticket Booking</h2>
        <form id="ticketForm">
            <div class="form-group">
                <input type="text" id="name" name="name" required placeholder="Name">
            </div>
            <div class="form-group">
                <input type="tel" id="phone" name="phone" required placeholder="Phone">
            </div>
            <div class="form-group">
                <input type="number" id="ticketNumber" name="ticketNumber" min="1" required placeholder="Ticket Number at least 1">
            </div>
            <div class="form-group">
                <input type="text" id="cardNumber" name="cardNumber" placeholder="cardNumber" required>
            </div>
            <button type="button" class="btn" id="addToCart">Add to Card</button>
        </form>
        <div id="cartDetails" style="display: none;">
            <h2>Cart Details</h2>
            <p>Name: <span id="cartName"></span></p>
            <p>Phone: <span id="cartPhone"></span></p>
            <p>Number of Tickets: <span id="cartTicketNumber"></span></p>
            <p>Card Number: <span id="cartCardNumber"></span></p>
            <button type="button" class="btn" id="checkout">Checkout</button>
        </div>
    </div>
    </div>
</body>
</html>
