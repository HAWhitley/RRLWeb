<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRL-Home</title>
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
            <header>
                <a href="adminindex.php">
                    <img src="Images/RRL Logo-no bg.png" align="left" style="padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons">
                </a>
                <input type='button' class='button' value='Log In/Sign Up' href="login.php">
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
        echo $_SESSION["admin"];
    ?>
</body>
</html>