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
        input {
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
                 style="display: block; padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons" >
            </a>

            
	    <form style="width:40%; background-color:#e7d5c5; display:inline-block; padding-bottom:50px" action="<?=$_SERVER['PHP_SELF']?>" method='post'>
                <div style="padding: 10px">
                    <!--Log In-->
                    <h3>Log In</h3>
                    <label>Email: </label>
                    <input type='text' id='user' name='user'> <br>
                    <label>Password: </label>
                    <input type='password' id='passwd' name='passwd'> <br> <br> 
                    <input type='submit' class="button" name='login' value='Log In'> <br> <br>

                    <!--Sign Up-->
                    <h3>Sign Up</h3>
                    <label>First Name: </label>
                    <input type='text' id='firstname' name='firstname' placeholder='John'> <br>
                    <label>Last Name: </label>
                    <input type='text' id='lastname' name='lastname' placeholder='Doe'> <br>
                    <label>Email: </label>
                    <input type='text' id='email' name='email' placeholder='123@example.com'> <br>
                    <label>Phone Number: </label>
                    <input type='text' id='phone' name='phone'> <br>
                    <label>Password: </label>
                    <input type='password' id='newpass' name='password'> <br> <br>
                    <input type='submit' class="button" name='submit' value='Sign Up'> <br> <br>
                </div>
	    </form>
	</div>
	<footer id="footer">
		<p>Hello</p>
	</footer>
    </div>
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
                            echo "Account does not exist under this email";
                            session_destroy();
                        }
                        else {
                            while($row = mysqli_fetch_assoc($getinfo)) {
				if($row["password"] == $auth) {
				    if($row["privilege"] == 'a') {
                                        echo "<meta http-equiv='refresh' content='0; URL=adminindex.php'/>";
                                    }
                                    else if($row["privilege"] == 'c') {
                                        echo "<meta http-equiv='refresh' content='0; URL=clientindex.php'/>";
                                    }
                                }
                                else {
                                    echo "Incorrect Password<br><br>";
                                    session_destroy();
                                }
                            }
                        }
                    }
                    else {
                        echo "Please enter information in all fields<br><br>";
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
		$skill = 'b';
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
                                echo "Account Successfully Created. Please Log In<br><br>";
                            }
                            else {
                                echo "Error creating account<br><br>";
                            }
                        }
                        else {
                            echo "Account already exists under this email<br><br>";
                        }
                    }
                    else {
                        echo "Please enter information in all fields<br><br>";
                    }
                }
                mysqli_close($conn);
            ?>
</body>
</html>
