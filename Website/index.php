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

        /* slideshow */

        * {box-sizing:border-box}

        /* Slideshow container */
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        padding-top:150px;
        }

        /* Hide the images by default */
        .mySlides {
        display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
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
    </style>
</head>
<body>
    <div id="page-container">
            <div id="content-wrap">
            <header>
                <a href="index.php">
                    <img src="Images/RRL Logo-no bg.png" align="left" style="padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons">
                </a>
                <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
                    <input type='submit' class='button' name='login' value='Log In/Sign Up' href="login.php">
                </form>
            </header>
            <br>
            <!-- slideshow -->
            <div>
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <!-- <div class="numbertext">1 / 3</div> -->
                        <img src="Images/horsejump.jpg" style="width:100%; height:500px">
                        <!-- <div class="text">Caption Text</div> -->
                    </div>

                    <div class="mySlides fade">
                        <!-- <div class="numbertext">2 / 3</div> -->
                        <img src="Images/childrider.jpg" style="width:100%; height:500px">
                        <!-- <div class="text">Caption Two</div> -->
                    </div>

                    <div class="mySlides fade">
                        <!-- <div class="numbertext">3 / 3</div> -->
                        <img src="Images/groupLesson.jpeg" style="width:100%; height:500px">
                        <!-- <div class="text">Caption Three</div> -->
                    </div>

                    <!-- Next and previous buttons -->
                    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
                </div>
                <br>

                <!-- The dots/circles -->
                <!-- <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div> -->
                <script>
                    var slideIndex = 0;
                    showSlides();

                    function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {slideIndex = 1}
                    slides[slideIndex-1].style.display = "block";
                    setTimeout(showSlides, 5000); // Change image every 5 seconds
                    }
                </script>
            </div>
            
            <div style="width:70%; display:inline-block; padding-top: 100px; text-align:left" width="500px">
                <h4>About</h4>
                &emsp;&emsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
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
        $login = $_POST['login'];
        if(isset($login)) {
            echo "<meta http-equiv='refresh' content='0; URL=login.php'/>";
        }
    ?>
<!--
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
-->
</body>
</html>
