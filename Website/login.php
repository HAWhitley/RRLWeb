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
        button {
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
            <a href="index.html">
                <img src="Images/RRL Logo-no bg.png" 
                align="left" style="display: block; padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons" >
            </a>
            <form style="width:40%; display:inline-block; padding-top: 150px">
                <div style="background-color:#e7d5c5; padding: 10px">
                    <!--Log In-->
                    <h3>Log In</h3>
                    <label>Email: </label>
                    <input type="text" id="user"> <br> <br>
                    <label>Password: </label>
                    <input type="password" id="passwd" > <br> <br> 
                    <button type="button">Log In</button> <br> <br>

                    <!--Sign Up-->
                    <h3>Sign Up</h3>
                    <label>First Name: </label>
                    <input type="text" id="firstname"> <br> <br>
                    <label>Last Name: </label>
                    <input type="text" id="lastname"> <br> <br>
                    <label>Email: </label>
                    <input type="text" id="email"> <br> <br>
                    <label>Password: </label>
                    <input type="password" id="newpass"> <br> <br>
                    <button type="button">Sign Up</button><br> <br>
                </div>
            </form>
        </div>
        <footer id="footer">
            <p>hello</p>
        </footer>
    </div>
</body>
</html>