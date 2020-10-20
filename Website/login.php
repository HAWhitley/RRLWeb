<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Rae's Riding Lessons</h2>
    <a href="index.html">Back to Home</a>
    <br>
    <!-- Existing users -->
    <form action='<?=$_SERVER['PHP_SELF'] ?>' method='post'>
        <h4>Log In</h4>
        <label>Email: </label>
        <input type='text' id='user' name='user'> <br>
        <label>Password: </label>
        <input type='password' id='passwd' name='passwd'> <br> <br> 
        <input type='submit' id='login' name='login' value='Log In'> <br> <br>
    </form>
    <?php
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
                $authenticate = "SELECT email, password FROM user WHERE email='" . $user . "'";
                $getinfo = mysqli_query($conn, $authenticate);
                if(mysqli_num_rows($getinfo) == 0) {
                    echo "<center> Account does not exist under this email </center>";
                }
                else {
                    
                    while($row = mysqli_fetch_assoc($getinfo)) {
                        if($row["password"] == $auth) {
                            echo "<center> Log In Successful </center><br><br>";
                        }
                        else {
                            echo "<center> Incorrect Password </center><br><br>";
                        }
                    }
                }
            }
            else {
                echo "<center> Please enter information in all fields </center><br><br>";
            }
        }
    ?>

    <!-- New Users -->
    <h4>Sign Up</h4>
    <form action='<?=$_SERVER['PHP_SELF'] ?>' method='post'>
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
        <input type='submit' id='submit' name='submit' value='Sign Up'> <br> <br>
    </form>
    <?php
        $servername = "localhost";
        $username = "user";
        $passwd = "CSU-CSCI490rrl";
        $database = "userauth";
        $conn = new mysqli($servername, $username, $passwd, $database);
        if(!$conn) {
            die("Connection failed: " . $conn->connect_error);
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

    ?>
</body>
</html>