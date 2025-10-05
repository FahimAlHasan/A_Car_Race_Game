<?php
// Database configuration
$host = "localhost:3308"; // if localhost is 3306, don't need to add this here
$username = "root"; // Your XAMPP MySQL username
$password = ""; // Your XAMPP MySQL password
$database = "game"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get all players and scores
$query = "SELECT player_name, player_score FROM player_scores ORDER BY player_score DESC";
$result = $conn->query($query);

// SQL query to get the highest score
$high_score_query = "SELECT player_name, player_score FROM player_scores ORDER BY player_score DESC LIMIT 1";
$high_score_result = $conn->query($high_score_query);
$highest_score_player = $high_score_result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Scores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            gap: 20px;
        }

        /* Left side - All players and scores */
        .left-div {
            width: 48%;
            background-color: #e0f7fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .left-div h1 {
            color: #00796b;
            font-size: 30px;
            margin-bottom: 20px;
            text-align: center;
        }

        .player-list {
            margin-bottom: 20px;
        }

        .player-list .player {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .player-list .player strong {
            font-weight: bold;
            color: #00796b;
        }

        .player-list .player .score {
            color: #26a69a;
            font-size: 20px;
        }

        /* Right side - Highest score */
        .right-div {
            width: 48%;
            background-color: #ffe0b2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .right-div h1 {
            color: #ff5722;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .highest-score {
            background-color: #fff3e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 24px;
            font-weight: bold;
            color: #d32f2f;
        }

        .highest-score .score {
            font-size: 26px;
            color: #d32f2f;
        }

        /* Return Home button styling */
        .return-home {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            background-color: #00796b;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
        }

        .return-home:hover {
            background-color: #004d40;
        }

        /* Recent History Heading */
        .racing-history {
            text-align: center;
            font-size: 28px;
            color: #00796b;
            margin: 40px 0 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: slideIn 1s ease-out forwards;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>

<!-- Recent History Heading with Animation -->
<h2 class="racing-history">Racing History</h2>

<div class="container">
    <!-- Left Div: All Players and Scores -->
    <div class="left-div">
        <h1>All Players</h1>
        <div class="player-list">
            <div class="player">
                <strong>Player Name</strong>
                <span>Score</span>
            </div>
            <?php
            if ($result->num_rows > 0) {
                // Output the data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='player'><strong>" . $row['player_name'] . "</strong><span class='score'>" . $row['player_score'] . "</span></div>";
                }
            } else {
                echo "<p>No scores available.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Right Div: Highest Score Player -->
    <div class="right-div">
        <h1>Highest Score</h1>
        <?php
        if ($highest_score_player) {
            echo "<div class='highest-score'>";
            echo "<strong>" . $highest_score_player['player_name'] . "</strong><br>";
            echo "Score: <span class='score'>" . $highest_score_player['player_score'] . "</span>";
            echo "</div>";
        } else {
            echo "<p>No highest score available.</p>";
        }
        ?>
    </div>
</div>

<!-- Return Home Link -->
<a href="Main_menu.php" class="return-home">Return Home</a>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>