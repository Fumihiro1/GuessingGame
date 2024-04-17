<?php
    session_start(); // start the session
    if (!isset($_SESSION["random"])) { // check if session variable exists
        $_SESSION["random"] = rand(1, 100); // create the session variable
    }
    $num = $_SESSION["random"]; // copy the value to a variable

    // Initialize numOfGuesses if it doesn't exist in the session
    if (!isset($_SESSION["numOfGuesses"])) {
        $_SESSION["numOfGuesses"] = 0;
    }
?>

<html>
<head>
    <title>Guessing Game</title>
</head>
<body>
    <h1>Guessing Game</h1>

    <form action="guessinggame.php" method="GET">
        <label for="user_guess">Enter a number between 1 and 100, and press the Guess button.</label><br><br>
        <input type="text" id="user_guess" name="user_guess">
        <button type="submit">Guess</button>
    </form>

    <?php
        if(isset($_GET["user_guess"])) {
            $guess = $_GET["user_guess"];
            $_SESSION["numOfGuesses"]++; // Increment the number of guesses
            
            // Check if the input is numeric and within the range 1-100
            if (!is_numeric($guess)) {
                echo "Please enter a valid numerical value.";
            } elseif ($guess < 1 || $guess > 100) {
                echo "Please enter a number between 1 and 100.";
            } else {
                if($guess > $num) { 
                    echo "The number you entered is higher than my number!";
                } elseif($guess < $num) { 
                    echo "The number you entered is lower than my number!";
                } else {
                    echo "Congratulations! You guessed the hidden number. </br></br>";
                    echo "Number of guesses: ".$_SESSION["numOfGuesses"].".";
                }
            }
        }
    ?>

    <p><a href="giveup.php">Give Up</a></p> 
    <p><a href="startover.php">Start Over</a></p>
</body>
</html>
