<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in Rae's Riding Lessons</title>
    <style>
        body {
            text-align: center;
            font-size:16pt;
        }
        label {
            margin-left: 15%;
            float: left;            
        }
        input:text,password {
            margin-right: 15%;
            float: right;
            font-size: 16pt;
            width: 300px;
        }

        .button {
            font-size: 16pt;
            padding:5px;
            width: 130px;
            color:white;
            background-color:#3a5a40;
        }

        /* The alert message box */
        .alert {
        padding: 20px;
        background-color: #f44336; /* Red */
        color: white;
        margin-bottom: 15px;
        float:top;
        }

        /* The close button */
        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
        color: black;
        }

        #page-container {
        position: relative;
        min-height: 100vh;
        }

        #content-wrap {
        padding-bottom: 100px;    /* Footer height */
        }

        #footer {
        background-color:#3a5a40;
        color: white;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100px;            /* Footer height */
        }
    </style>
</head>
<body>
    <div id="page-container">
        <div id="content-wrap">
            <!-- <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Error
            </div> -->
            <a href="index.php">
                <img src="Images/RRL Logo-no bg.png" 
                align="left" style="display: block; padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons" >
            </a>
            <form style="width:40%; display:inline-block; padding-top: 150px" action="<?=$_SERVER['PHP_SELF']?>" method='post'>
                <div style="background-color:#e7d5c5; padding: 10px">
                    <!--Log In-->
                    <h3>Log In</h3>
                    <label>Email: </label>
                    <input type='text' name='user'> <br> <br>
                    <label>Password: </label>
                    <input type='password' name='passwd'> <br> <br>  <br>
                    <input type='submit' class="button" name='login' value='Log In'> <br> <br> <br>

                    <!--Sign Up-->
                    <h3>Sign Up</h3>
                    <label>First Name: </label>
                    <input type='text' name='firstname' placeholder='John'> <br> <br>
                    <label>Last Name: </label>
                    <input type='text' name='lastname' placeholder='Doe'> <br> <br>
                    <label>Email: </label>
                    <input type='text' name='email' placeholder='123@example.com'> <br> <br>
                    <label>Phone Number: </label>
                    <input type='text' name='phone'> <br> <br>
                    <label>Password: </label>
                    <input type='password' name='password'> <br> <br> <br>
                    <input type='submit' class="button" name='submit' value='Sign Up'> <br> <br> <br>
                </div>
            </form>
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

                $user = $_POST['user'];
                $auth = $_POST['passwd'];
                $logon = $_POST['login'];

                if(isset($logon)) {
                    if($user != NULL && $auth != NULL) {
                        $_SESSION["user"] = $user;
                        $authenticate = "SELECT * FROM user WHERE email='" . $user . "'";
                        $getinfo = mysqli_query($conn, $authenticate);
                        if(mysqli_num_rows($getinfo) == 0) {
                            echo "<center> Account does not exist under this email </center>";
                            session_destroy();
                        }
                        else {

                            while($row = mysqli_fetch_assoc($getinfo)) {
                                if($row["password"] == $auth) {
                                    if($row["privilege"] == 'a') {
                                        echo "<meta http-equiv='refresh' content='time; URL=adminindex.php'/>";
                                    }
                                    else if($row["privilege"] == 'c') {
                                        echo "<meta http-equiv='refresh' content='time; URL=clientindex.php'/>";
                                    }
                                }
                                else {
                                    echo "<center> Incorrect Password </center><br><br>";
                                    session_destroy();
                                }
                            }
                        }
                    }
                    else {
                        echo "<center> Please enter information in all fields </center><br><br>";
                        session_destroy();
                    }
                }

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $pass = $_POST['password'];
                $priv = 'c';
                $active = 'a';
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
                                echo "<center> Account Successfully Created. Please Log In </center><br><br>";
                            }
                            else {
                                echo "<center> Error creating account </center><br><br>";
                            }
                        }
                        else {
                            echo "<center> Account already exists under this email </center><br><br>";
                        }
                    }
                    else {
                        echo "<center> Please enter information in all fields </center><br><br>";
                    }
                }
                mysqli_close($conn);
            ?>
        </div>
        <footer id="footer">
            <p></p>
            <div width="500px" height="100px" style="margin:auto; padding-top:50px">
                <a href="mailto:raesridinglessons@gmail.com" style="color:white">raesridinglessons@gmail.com</a> 
                &emsp;&emsp; Phone: 123-456-7890 &emsp;&emsp; 
                <a href="facebook.com"><img src="Images/facebook.png" width= "30px" height= "30px" alt="facebook"></a> &emsp; 
                <a href="instagram.com"><img src="Images/instagram.png" width= "30px" height= "30px" alt="instagram"></a>
            </div>
        </footer>
    </div>
</body>
</html>