<?php
    session_start(); // start the session
    $num = $_SESSION["random"]; // get the hidden number from the session
?>
<html>
<head>
    <title>Give Up</title>
</head>
<body>
    <p>The hidden number was: <?php echo $num; ?></p>
    <p><a href="startover.php">Start Over</a></p>
</body>
</html>
