<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Calendar</title>
</head>
<body>
    <h2>This is the Client Calendar<h2>
    <a href="clientindex.php">Home</a>
    <a href="clientcal.php">Schedule an Appointment</a>
    <a href="index.php">Log Out</a><br>
    <?php
        session_start();
        echo $_SESSION["user"];
    ?>
    <iframe src="https://www.picktime.com/raesridinglessons" width="100%" height="1050"></iframe>
</body>
</html>