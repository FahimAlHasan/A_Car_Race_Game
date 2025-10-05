<?php
// Database connection
$servername = "localhost:3308"; //if localhost is 3306, don't need to add this here
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password
$dbname = "game";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from AJAX request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player_name = $conn->real_escape_string($_POST['player_name']);
    $player_score = (int)$_POST['player_score'];

    // Insert the data into the table
    $sql = "INSERT INTO player_scores (player_name, player_score) VALUES ('$player_name', $player_score)";

    if ($conn->query($sql) === TRUE) {
        echo "Score saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
