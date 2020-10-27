<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List Page</title>
</head>
<body>
    <a href="adminindex.php">Home</a>
    <a href="admincal.php">Schedule an Appointment</a>
    <a href="clientlist.php">Client List</a>
    <a href="index.php">Log Out</a>
    <?php
        session_start();
        $servername = "localhost";
        $username = "user";
        $passwd = "CSU-CSCI490rrl";
        $database = "userauth";
        $conn = new mysqli($servername, $username, $passwd, $database);
        if(!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }
        $authenticate = "SELECT * FROM user WHERE privilege='c'";
        $getinfo = mysqli_query($conn, $authenticate);
        echo "<br><br>";
        if(mysqli_num_rows($getinfo) == 0) {
            echo "There are no client accounts";
        }
        else {
            while($row = mysqli_fetch_assoc($getinfo)) {
                if($row["privilege"] == "c") {
                    echo $row["firstName"] . " " . $row["lastName"] . ":<br>";
                    echo $row["email"] . "<br>";
                    echo $row["phone"] . "<br>";
                    
                    if($row["skill"] == "b") {
                        echo "Beginner<br>";
                    }
                    else if($row["skill"] == "i") {
                        echo "Intermediate<br>";
                    }
                    else if($row["skill"] == "a") {
                        echo "Advanced<br>";
                    }

                    if($row["active"] == "a") {
                        echo "Active<br>";
                    } 
                    else if($row["active"] == "i") {
                        echo "Inactive<br>";
                    }
                    echo "<br>";
                }
            }
        }
    ?>
</body>
</html>