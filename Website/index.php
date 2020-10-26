<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>

    .button {
    font-size: 16pt;
    padding:5px;
    width: 130px;
    color:white;
    background-color: rgb(204, 118, 69);
    }

    div.about {
    border: thin solid black;
    width: 50%;
    background-color: rgb(143, 179, 143);}

    p.review {
    padding: 10px;
    border-style: solid;
    width: 50%;
    
    }

    label {
    margin-left: 15%;
    float: left;   
    font-size: 16pt;         
    }
        
    input {
    margin-right: 15%;
    float: right;
    font-size: 16pt;
    width: 300px;
    }

    textarea {
    margin-right: 15%;
    float: right;
    font-size: 16pt;
    width: 300px;
    }

    .row {
    display: flex;
    width: 70%;
    }

    .column1 {
    flex: 50%;
    padding-bottom: 50px;
    float: left;
    font-size: 16pt;
    }

    .column2 {
    flex: 55%;
    display: inline-block;
    float: left;
    background-color: silver;
    }

    img.map {
    width: 250px;
    height: 250px;
    }

    </style>
</head>
<body>
<div>
        
    <p style="float: right; font-size: 16pt;">
        <a href="login.php">Log in / Sign up</a>
    </p>
    <a href="index.php">
        <img src="Images/RRL Logo-no bg.png" 
         style="display: block; padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons" >
    </a>
    </div>
    
    <hr>

    
    <center>
    <h2>About</h2>
    <div class="about">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in <br>
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat <br>
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in <br>
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat <br>
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br>
     
    </div>

    <h2>Reviews</h2>
    <p class="review">
        From: Anonymous <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
        laboris nisi ut aliquip ex ea commodo consequat.
    </p>
    <p class="review">
        From: Anonymous <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
        laboris nisi ut aliquip ex ea commodo consequat.
    </p>
    <p class="review">
        From: Anonymous <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
        laboris nisi ut aliquip ex ea commodo consequat.
    </p>

    <div class="row">
    <div class="column1">
        <p>
            <img class="map" src="Images/OIP.jpg" alt="Google Maps"> <br>
            Rae's Riding Lessons <br>
            123 Address Lane, Charleston SC 29406 US <br>
            <br>
            Phone: +1 (800) 123-4567 <br>
            Email: emailaddress@hotmail.com <br>
        </p>
    </div>

    <div class="column2">
        <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
            <div>
                <!--Contact-->
                <h2 style="text-decoration: underline">Contact Us</h2>
                <label >Name: </label>
                <input type='text' id='user' name='user' placeholder='John Doe'> <br> <br>
                <label >Email: </label> 
                <input type='text' id='email' name='email' placeholder='123@example.com'> <br> <br>
                <label >Subject: </label> 
                <input type='subject' id='subject' name='subject'> <br> 
                <label >Message: </label> 
                <textarea name="message" id="message" cols="30" rows="10"></textarea>

              <input type='submit' class='button' name='submit' value='Submit'> <br> <br>

             </div>
    </div>
</form>
</div>
    
 </center>
</body>
</html>
