<?php
$servername = "localhost";  // Change this to the address of your MySQL server
$username = "root";  // Change this to your MySQL username
$password = "";  // Change this to your MySQL password
$dbname = "test";  // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Collect form data
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $passengers = $_POST['passengers'];
    $depart = $_POST['depart'];
    $back = $_POST['back'];

    // Insert data into the database
    $sql = "INSERT INTO flights (origin, destination, passengers, depart, back) 
            VALUES ('$origin', '$destination', $passengers, '$depart', '$back')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="plane.png" type="x-icon">
</head>
<body>
<div class="logo">
    <img class="logo" src="logo.png" alt="">
</div>
<div id="content">
    <h1>Please enter your Destination first!</h1>
</div>

<div id="home" class="Flights">
    <h3 class="lab">Flights</h3>
    <form action="f4.php" method="POST">
      
        <select name="origin" class="drop" id="ori">
            <option value="Origin">Origin</option>
            <option value="Mumbai">MUMBAI</option>
            <option value="Delhi">DELHI</option>
            <option value="Banglore">BANGLORE</option>
            <option value="Kolkata">KOLKATA</option>
        </select>
        <i class="fas fa-exchange-alt"></i>
        <select name="destination" class="drop" id="dest">
            <option value="Destination">Destination</option>
            <option value="Mumbai">MUMBAI</option>
            <option value="Delhi">DELHI</option>
            <option value="Banglore">BANGLORE</option>
            <option value="Kolkata">KOLKATA</option>
        </select>
        <i class="fas fa-exchange-alt"></i>
        <input type="number" class="drop" name="passengers" step="1" min="1" max="10" placeholder="Number Of Passengers">
        <span class="lab">Departure:</span>
        <input type="date" name="depart" class="drop" id="depart">
        <span class="lab">Return:</span>
        <input type="date" name="back" class="drop" >
        <input type="submit" name="submit" id="flightsButton">

    </form>
</div>

</body>
</html>
