<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRL-Admin List</title>
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
        input[type=text], input[type=password] {
            float:right;
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
        /* The alert message box */
        .alert {
        padding: 20px;
        background-color: #f44336; /* Red */
        color: white;
        margin-bottom: 15px;
        position: fixed;
        top: 0px;
        left:0px;
        width: 100%;
        }

        .alert.success {background-color: #4CAF50;}

        /* The close button */
        .closebtn {
        margin-left: 15px;
        margin-right: 30px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.5s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
        color: black;
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
                
                $authenticate = "SELECT * FROM user WHERE privilege='a' OR privilege='b'";
                $getinfo = mysqli_query($conn, $authenticate);
                $show = "SELECT * FROM user WHERE privilege='a' OR privilege='b'";
                $list = mysqli_query($conn, $show);

                echo "<h3>Add an Admin</h3>
                <div style='display:inline-block; text-align:left; padding-top: 5px' width='500px'>
                <label>First Name: </label>
                <input type='text' name='firstname' placeholder='John'> <br> <br>
                <label>Last Name: </label>
                <input type='text' name='lastname' placeholder='Doe'> <br> <br>
                <label>Email: </label>
                <input type='text' name='email' placeholder='123@example.com'> <br> <br>
                <label>Phone Number: </label>
                <input type='text' name='phone'> <br> <br>
                <label>Password: </label>
                <input type='password' name='password'></div> <br> <br> <br>
                <input type='submit' class='submit' name='submit' value='Add Admin'> <br> <br> <br>";
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $pass = $_POST['password'];
                $priv = 'a';
                $active = 'a';
                $skill = 'a';
                $button = $_POST['submit'];
                if(isset($button)) {
                    if($firstname != NULL && $lastname != NULL && $email != NULL && $pass != NULL && $phone != NULL) {
                        $search = "SELECT email FROM user WHERE email='" . $email . "'";
                        $result = mysqli_query($conn, $search);
                        if(mysqli_num_rows($result) == 0) {
                            $enter = "INSERT INTO user (firstName, lastName, email, password, phone, skill, active, privilege)
                                VALUES ('" . $firstname . "', '" . $lastname . "', '" . $email . "',
                                '" . $pass . "', '" . $phone . "', '" . $skill . "', '" . $active . "', '" . $priv . "')";
                            if($conn->query($enter)) {
                                echo "<div class='alert success'>
                                    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                    Account successfully created.
                                    </div>";
                                    echo "<meta http-equiv='refresh' content='5'>";
                            }
                            else {
                                echo "<div class='alert'>
                                <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                Error creating account.
                                </div>";
                            }
                        }
                        else {
                            echo "<div class='alert'>
                                <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                Account already exists under this email.
                                </div>";
                        }
                    }
                    else {
                        echo "<div class='alert'>
                                <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                Please enter information in all fields.
                                </div>";
                    }
                }
                echo "<br><br>";
                if(mysqli_num_rows($getinfo) == 0) {
                    echo "There are no client accounts";
                }
                else {
                    if($_SESSION["privilege"] == 'b') {
                        echo "<label for='clients'>Edit client: </label>";
                        echo "<select name='clients' id='clients'>";
                        while($row = mysqli_fetch_assoc($list)) {
                            echo "<option value='" . $row["email"] . "'>" . $row["firstName"] . " " . $row["lastName"] . "</option>";
                        }
                        echo "</select>";
                        echo "&emsp; &emsp;<input type='submit' class='submit' name='delete' value='Delete Admin' onclick='clicked(event)'><br><br> <br>";
                        $delete = $_POST["delete"];
                        $cname = $_POST["clients"];
                        if(isset($delete)) {
                            if($cname != $_SESSION["user"]) {
                                //<button onclick="myFunction()">Try it</button>
                                echo "<p id='demo'></p><script>function myFunction() {var txt; if (confirm('Are you sure you want to delete this person?')) { txt = 'You pressed OK!';} else {txt = 'You pressed Cancel!';} document.getElementById('demo').innerHTML = txt;}</script>";
                                $deleteInfo = "DELETE FROM user WHERE email='" . $cname . "'";
                                if($conn->query($deleteInfo)) {
                                    echo "<div class='alert success'>
                                    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                    Account successfully deleted.
                                    </div>";
                                    echo "<meta http-equiv='refresh' content='5'>";
                                }
                                else {
                                    echo "<div class='alert'>
                                    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                    Error updating account.
                                    </div>";
                                }
                            }
                            else {
                                echo "<div class='alert'>
                                <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                                You can't delete yourself.
                                </div>";
                            }
                        }
                    }
                    echo "<br><br>";
                    echo "<center>";
                    echo "<table style='width:50%'>";
                    echo "<tr>";
                    echo "<th>First Name</th>";
                    echo "<th>Last Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phone Number</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_assoc($getinfo)) {
                        echo "<tr>";
                        if($row["privilege"] == "a" || $row["privilege"] == "b") {
                            echo "<td>" . $row["firstName"] . "</td>";
                            echo "<td>" . $row["lastName"] . "</td>";
                            echo "<td><a href='mailto:" . $row["email"] . "' style='color:black'>" . $row["email"] . "</a></td>";
                            echo "<td>" . $row["phone"] . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</center>";
                }
                echo "<script>
                // Get all elements with class='closebtn'
                var close = document.getElementsByClassName('closebtn');
                var i;
        
                // Loop through all close buttons
                for (i = 0; i < close.length; i++) {
                // When someone clicks on a close button
                    close[i].onclick = function(){
        
                        // Get the parent of <span class='closebtn'> (<div class='alert'>)
                        var div = this.parentElement;
        
                        // Set the opacity of div to 0 (transparent)
                        div.style.opacity = '0';
        
                        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                        setTimeout(function(){ div.style.display = 'none'; }, 600);
                    }
                }

                function clicked(e)
                {
                    if(!confirm('Are you sure?')) {
                        e.preventDefault();
                    }
                }
                </script>";
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
