<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Home</title>
</head>
<body>
    <h2>This is the Client Home Page</H2>
    <h2>Rae's Riding Lessons</h2>
    <a href="clientindex.php">Home</a>
    <a href="clientcal.php">Schedule an Appointment</a>
    <a href="index.php">Log Out</a>
    <center>
        <h4>About</h4>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in <br>
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat <br>
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br>
    </center>
    <?php
        session_start();
        echo $_SESSION["user"];
    ?>
</body>
</html>