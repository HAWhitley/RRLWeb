<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRL-Client List</title>
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
            width: 170px;
            color: white;
            background-color: #3a5a40;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        body {
            text-align: center;
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
                $servername = "localhost";
                $username = "user";
                $passwd = "CSU-CSCI490rrl";
                $database = "userauth";
                $conn = new mysqli($servername, $username, $passwd, $database);
                if(!$conn) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $login = $_POST['login'];
                if(isset($login)) {
                    echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";
                }

                $authenticate = "SELECT * FROM user WHERE privilege='c'";
                $getinfo = mysqli_query($conn, $authenticate);
                $show = "SELECT * FROM user WHERE privilege='c'";
                $list = mysqli_query($conn, $show);
                echo "<br><br>";
                if(mysqli_num_rows($getinfo) == 0) {
                    echo "There are no client accounts";
                }
                else {
                    echo "<center>";
                    echo "<table style='width=100%'>";
                    echo "<tr>";
                    echo "<th>First Name</th>";
                    echo "<th>Last Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phone Number</th>";
                    echo "<th>Skill Level</th>";
                    echo "<th>Activity</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_assoc($getinfo)) {
                        echo "<tr>";
                        if($row["privilege"] == "c") {
                            echo "<td>" . $row["firstName"] . "</td>";
                            echo "<td>" . $row["lastName"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            
                            if($row["skill"] == "b") {
                                echo "<td>Beginner</td>";
                            }
                            else if($row["skill"] == "i") {
                                echo "<td>Intermediate</td>";
                            }
                            else if($row["skill"] == "a") {
                                echo "<td>Advanced</td>";
                            }

                            echo " &emsp; &emsp;";

                            if($row["active"] == "a") {
                                echo "<td>Active</td>";
                            } 
                            else if($row["active"] == "i") {
                                echo "<td>Inactive</td>";
                            }
                        }
                        echo "</tr>";
                    }
                    echo "</center>";
                    echo "<br><br>";
                    echo "<label for='clients'>Edit client: </label>";
                    echo "<select name='clients' id='clients'>";
                    while($row = mysqli_fetch_assoc($list)) {
                        echo "<option value='" . $row["email"] . "'>" . $row["firstName"] . " " . $row["lastName"] . "</option>";
                    }
                    echo "</select>";
                    echo "<select name='skill' id='skill'>";
                    echo "<option value='b'>Beginner</option>";
                    echo "<option value='i'>Intermediate</option>";
                    echo "<option value='a'>Advanced</option>";
                    echo "</select>";
                    echo "<select name='activity' id='activity'>";
                    echo "<option value='a'>Active</option>";
                    echo "<option value='i'>Inactive</option>";
                    echo "</select>";
                    echo "&emsp; &emsp;<input type='submit' class='submit' name='edit' value='Edit Client'>";
                    echo "&emsp; &emsp;<input type='submit' class='submit' name='delete' value='Delete Client'><br>";
                    $edit = $_POST["edit"];
                    $delete = $_POST["delete"];
                    $cname = $_POST["clients"];
                    $cskill = $_POST["skill"];
                    $cactivity = $_POST["activity"];
                    if(isset($edit)) {
                        $updateInfo = "UPDATE user SET skill='" . $cskill . "', active='" . $cactivity . "' WHERE email='" . $cname . "'";
                        if($conn->query($updateInfo)) {
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                        else {
                            echo "<br>Error updating account<br>";
                        }
                    }
                    if(isset($delete)) {
                        $deleteInfo = "DELETE FROM user WHERE email='" . $cname . "'";
                        if($conn->query($deleteInfo)) {
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                        else {
                            echo "<br>Error updating account<br>";
                        }
                    }
                    echo "<br><br>";
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
            </form>
        </div>
        <footer id="footer">
            <p></p>
            <!-- <div width="500px" height="100px" style="margin:auto; padding-top:50px"> -->
                <a href="mailto:raesridinglessons@gmail.com" style="color:white">raesridinglessons@gmail.com</a> 
                &emsp;&emsp; 
                <span style="color:white">Phone: 123-456-7890</span>
                &emsp;&emsp; 
                <a href="https://www.facebook.com" target="_blank"><img src="Images/facebook.png" width= "30px" height= "30px" alt="facebook"></a> &emsp; 
                <a href="https://www.instagram.com" target="_blank"><img src="Images/instagram.png" width= "30px" height= "30px" alt="instagram"></a>
            <!-- </div> -->
        </footer>
    </div>
</body>
</html>