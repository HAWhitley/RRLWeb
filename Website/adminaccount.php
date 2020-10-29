<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRL-Edit Account</title>
    <style>
        .button {
            font-size: 16pt;
            padding: 5px;
            width: 170px;
            color: white;
            background-color: #3a5a40;
            float: right;
            align: top;
        }

        .submit {
            font-size: 16pt;
            padding: 5px;
            width: 190px;
            color: white;
            background-color: #3a5a40;
        }

        body {
            text-align: center;
        }

        label {
            float: left;
        }

        .input {
            float:right;
        }

        /* page styling */

        #page-container {
            position: relative;
            min-height: 100vh;
        }

        #content-wrap {
            padding-bottom: 150px;    /* Footer height */
        }

        #footer {
            background-color: #3a5a40;
            color: white;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;            /* Footer height */
        }

        a.nav {
            text-decoration: none;
            color: black;
            font-size: 16pt;
        }

        a.nav:hover{
            color: #3a5a40;
        }
    </style>
</head>
<body>
    <div id="page-container">
            <div id="content-wrap">
            <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
            <header>
                <a href="adminindex.php">
                    <img src="Images/RRL Logo-no bg.png" align="left" style="padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons">
                </a>
                <input type='submit' class='button' name='login' value='Log Out' href="index.php">
                <div style="padding-top: 50px; padding-right:150px; align:center; float:center">
                    <a class="nav" href="adminindex.php">Home</a>
                    &emsp; &emsp; ~ &emsp; &emsp; 
                    <a class="nav" href="admincal.php">Manage Lessons</a>
                    &emsp; &emsp; ~ &emsp; &emsp;
                    <a class="nav" href="listofclients.php">Manage Clients</a>
                    &emsp; &emsp; ~ &emsp; &emsp;
                    <a class="nav" href="listofadmin.php">Manage Admins</a>
                    &emsp; &emsp; ~ &emsp; &emsp; 
                    <a class="nav" href="adminaccount.php">Edit Account</a>
                </div>
            </header>
            <br>
            <?php
                $login = $_POST['login'];
                if(isset($login)) {
                    echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";
                }
                $servername = "localhost";
                $username = "user";
                $passwd = "CSU-CSCI490rrl";
                $database = "userauth";
                $conn = new mysqli($servername, $username, $passwd, $database);
                if(!$conn) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $user = $_SESSION["user"];
                $authenticate = "SELECT * FROM user WHERE email='" . $user . "'";
                $getinfo = mysqli_query($conn, $authenticate);
                $first;
                $last;
                $em;
                $pass;
                $phone;
                echo "<br><br><br><br>";
                #echo "<div style='display:inline-block; text-align:left; padding-top: 50px' width='500px'>";
                while($row = mysqli_fetch_assoc($getinfo)) {
                    $first = $row["firstName"];
                    $last = $row["lastName"];
                    $em = $row["email"];
                    $phone = $row["phone"];
                    $pass = $row["password"];
                    echo "<div style='display:inline-block; text-align:left; padding-top: 50px' width='500px'>
                    <label>First Name: </label> 
                    <input type='text' name='fname' class='input' value='" . $first . "'>
                    <br> <br>
                    <label>Last Name: </label>
                    <input type='text' name='lname' class='input' value='" . $last . "'>
                    <br> <br>
                    <label>Phone Number: </label>
                    <input type='text' name='number' class='input' value='" . $phone . "'>
                    <br> <br>
                    <label>Email: </label>
                    <input type='text' name='email' class='input' value='" . $em . "'>
                    </div>
                    <br> <br> <br>";
                }
                echo "<input type='submit' class='submit' name='edit' value='Edit Details'><br>";
                echo "<div style='display:inline-block; text-align:left; padding-top: 50px' width='500px'>";
                echo "<label>Current Password: </label>
                    <input type='password' name='pwd' class='input'>
                    <br> <br>
                    <label>New Password: </label>
                    <input type='password' name='newpwd' class='input'>
                    </div>
                    <br> <br> <br>
                    <input type='submit' class='submit' name='pchange' value='Change Password'><br><br>";

                $edit = $_POST['edit'];
                $change = $_POST['pchange'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $number = $_POST['number'];
                $ema = $_POST['email'];
                $curr = $_POST['pwd'];
                $new = $_POST['newpwd'];

                if(isset($edit)) {
                    if($fname != NULL && $lname != NULL && $number != NULL && $ema != NULL) {
                        $updateInfo = "UPDATE user SET firstName='" . $fname . "', lastName='" . $lname ."', phone='" . $number . "', email='" . $ema . "' WHERE email='" . $user . "'";
                        if($conn->query($updateInfo)) {
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                        else {
                            echo "<br>Error updating account<br>";
                        }
                    }
                    else {
                        echo "<br>Please Enter Information in All Fields<br>";
                    }
                }
                
                if(isset($change)) {
                    if($curr != NULL && $new != NULL) {
                        if($curr == $pass) {
                            $updatePass = "UPDATE user SET password='" . $new . "' WHERE email='" . $user . "'";
                            if($conn->query($updatePass)) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                            else {
                                echo "<br>Error updating account<br>";
                            }
                        }
                        else {
                            echo "<br>Password Incorrect<br>";
                        }
                    }
                    else {
                        echo "<br>Please Enter Information in All Fields<br>";
                    }
                }
            ?>
            </form>
        </div>
        <footer id="footer">
            <p></p>
            <!-- <div width="500px" height="100px" style="margin:auto; padding-top:50px"> -->
                <a href="mailto:raesridinglessons@gmail.com" style="color:white">raesridinglessons@gmail.com</a> 
                &emsp;&emsp; 
                <span style="color:white">Phone: 123-456-7890</span>
                &emsp;&emsp; 
                <a href="facebook.com"><img src="Images/facebook.png" width= "30px" height= "30px" alt="facebook"></a> &emsp; 
                <a href="instagram.com"><img src="Images/instagram.png" width= "30px" height= "30px" alt="instagram"></a>
            <!-- </div> -->
        </footer>
    </div>
</body>
</html>