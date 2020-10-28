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
            width: 170px;
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
                <a href="clientindex.php">
                    <img src="Images/RRL Logo-no bg.png" align="left" style="padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons">
                </a>
                <input type='submit' class='button' name='login' value='Log Out' href="index.php">
                <div style="padding-top: 50px; padding-right:150px; align:center; float:center">
                    <a class="nav" href="clientindex.php">Home</a>
                    &emsp; &emsp; ~ &emsp; &emsp; 
                    <a class="nav" href="clientcal.php">Schedule a Lesson</a>
                    &emsp; &emsp; ~ &emsp; &emsp; 
                    <a class="nav" href="clientaccount.php">Edit Account</a>
                </div>
            </header>
            <br>
            <?php
                $login = $_POST['login'];
                if(isset($login)) {
                    echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";
                }
            ?>
                <div style="display:inline-block; text-align:left; padding-top: 50px" width="500px">
                    <label>First Name: </label> 
                    <input type='text' name='fname' class='input'>
                    <br> <br>
                    <label>Last Name: </label>
                    <input type='text' name='lname' class='input'>
                    <br> <br>
                    <label>Phone Number: </label>
                    <input type='text' name='number' class='input'>
                    <br> <br>
                    <label>Email: </label>
                    <input type='text' name='email' class='input'>
                    <br> <br> <br>
                    <label>Current Password: </label>
                    <input type='password' name='pwd' class='input'>
                    <br> <br>
                    <label>New Password: </label>
                    <input type='password' name='newpwd' class='input'>
                </div>
                <br> <br> <br>
                <input type='submit' class='submit' value='Save Changes'>
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
    <?php
        session_start();
        echo $_SESSION["user"];
    ?>
</body>
</html>