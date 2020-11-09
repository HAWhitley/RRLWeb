<?php
  session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>RRL-Calendar</title>

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

        .select {
            font-size: 16pt;
            padding: 15px;
            width: 300px;
            color: white;
            background-color: #3a5a40;
            align: center;
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
                <a href="clientindex.php">
                    <img src="Images/RRL Logo-no bg.png" align="left" style="padding-top: 10px" width="350px" height="100px" alt="Rae's Riding Lessons">
                </a>
                <input type='submit' class='button' name='login' value='Log Out' href="login.php">
                <div style="padding-top: 50px; padding-right:150px; align:center; float:center">
                    <a class="nav" href="clientindex.php">Home</a>
                    &emsp; &emsp; ~ &emsp; &emsp; 
                    <a class="nav" href="clientcal.php">Schedule a Lesson</a>
                    &emsp; &emsp; ~ &emsp; &emsp; 
                    <a class="nav" href="clientaccount.php">Edit Account</a>
                </div>
            </header>
            <div style="float:center; padding-top: 100px">
                    <input type='submit' class='select' name='one' value='One on One'>
                    &emsp; &emsp;
                    <input type='submit' class='select' name='group' value='Group'>
                    <br><br>
            </div>
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
          
            $login = $_POST['login'];
            if(isset($login)) {
                echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";
            }

            $single = $_POST['one'];
            $group = $_POST['group'];
            if(isset($single)) {
                echo "<iframe
                id='JotFormIFrame-202954326786162'
                title='One on One Appointments'
                onload='window.parent.scrollTo(0,0)'
                allowtransparency='true'
                allowfullscreen='true'
                allow='geolocation; microphone; camera'
                src='https://form.jotform.com/202954326786162'
                frameborder='0'
                style='
                min-width: 100%;
                height:539px;
                border:none;'
                scrolling='no'
              >
              </iframe>
              <script type='text/javascript'>
                var ifr = document.getElementById('JotFormIFrame-202954326786162');
                if(window.location.href && window.location.href.indexOf('?') > -1) {
                  var get = window.location.href.substr(window.location.href.indexOf('?') + 1);
                  if(ifr && get.length > 0) {
                    var src = ifr.src;
                    src = src.indexOf('?') > -1 ? src + '&' + get : src  + '?' + get;
                    ifr.src = src;
                  }
                }
                window.handleIFrameMessage = function(e) {
                  if (typeof e.data === 'object') { return; }
                  var args = e.data.split(':');
                  if (args.length > 2) { iframe = document.getElementById('JotFormIFrame-' + args[(args.length - 1)]); } else { iframe = document.getElementById('JotFormIFrame'); }
                  if (!iframe) { return; }
                  switch (args[0]) {
                    case 'scrollIntoView':
                      iframe.scrollIntoView();
                      break;
                    case 'setHeight':
                      iframe.style.height = args[1] + 'px';
                      break;
                    case 'collapseErrorPage':
                      if (iframe.clientHeight > window.innerHeight) {
                        iframe.style.height = window.innerHeight + 'px';
                      }
                      break;
                    case 'reloadPage':
                      window.location.reload();
                      break;
                    case 'loadScript':
                      var src = args[1];
                      if (args.length > 3) {
                          src = args[1] + ':' + args[2];
                      }
                      var script = document.createElement('script');
                      script.src = src;
                      script.type = 'text/javascript';
                      document.body.appendChild(script);
                      break;
                    case 'exitFullscreen':
                      if      (window.document.exitFullscreen)        window.document.exitFullscreen();
                      else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
                      else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
                      else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
                      else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
                      break;
                  }
                  var isJotForm = (e.origin.indexOf('jotform') > -1) ? true : false;
                  if(isJotForm && 'contentWindow' in iframe && 'postMessage' in iframe.contentWindow) {
                    var urls = {'docurl':encodeURIComponent(document.URL),'referrer':encodeURIComponent(document.referrer)};
                    iframe.contentWindow.postMessage(JSON.stringify({'type':'urls','value':urls}), '*');
                  }
                };
                if (window.addEventListener) {
                  window.addEventListener('message', handleIFrameMessage, false);
                } else if (window.attachEvent) {
                  window.attachEvent('onmessage', handleIFrameMessage);
                }
              </script>";
            }
            if(isset($group)) {
              $user = $_SESSION["user"];
              $authenticate = "SELECT * FROM user WHERE email='" . $user . "'";
              $getinfo = mysqli_query($conn, $authenticate);
              while($row = mysqli_fetch_assoc($getinfo)) {
                  if($row["skill"] == 'b') {
                    echo "<iframe
                    id='JotFormIFrame-202953896133159'
                    title='One on One Appointments'
                    onload='window.parent.scrollTo(0,0)'
                    allowtransparency='true'
                    allowfullscreen='true'
                    allow='geolocation; microphone; camera'
                    src='https://form.jotform.com/202953896133159'
                    frameborder='0'
                    style='
                    min-width: 100%;
                    height:539px;
                    border:none;'
                    scrolling='no'
                  >
                  </iframe>
                  <script type='text/javascript'>
                    var ifr = document.getElementById('JotFormIFrame-202953896133159');
                    if(window.location.href && window.location.href.indexOf('?') > -1) {
                      var get = window.location.href.substr(window.location.href.indexOf('?') + 1);
                      if(ifr && get.length > 0) {
                        var src = ifr.src;
                        src = src.indexOf('?') > -1 ? src + '&' + get : src  + '?' + get;
                        ifr.src = src;
                      }
                    }
                    window.handleIFrameMessage = function(e) {
                      if (typeof e.data === 'object') { return; }
                      var args = e.data.split(':');
                      if (args.length > 2) { iframe = document.getElementById('JotFormIFrame-' + args[(args.length - 1)]); } else { iframe = document.getElementById('JotFormIFrame'); }
                      if (!iframe) { return; }
                      switch (args[0]) {
                        case 'scrollIntoView':
                          iframe.scrollIntoView();
                          break;
                        case 'setHeight':
                          iframe.style.height = args[1] + 'px';
                          break;
                        case 'collapseErrorPage':
                          if (iframe.clientHeight > window.innerHeight) {
                            iframe.style.height = window.innerHeight + 'px';
                          }
                          break;
                        case 'reloadPage':
                          window.location.reload();
                          break;
                        case 'loadScript':
                          var src = args[1];
                          if (args.length > 3) {
                              src = args[1] + ':' + args[2];
                          }
                          var script = document.createElement('script');
                          script.src = src;
                          script.type = 'text/javascript';
                          document.body.appendChild(script);
                          break;
                        case 'exitFullscreen':
                          if      (window.document.exitFullscreen)        window.document.exitFullscreen();
                          else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
                          else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
                          else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
                          else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
                          break;
                      }
                      var isJotForm = (e.origin.indexOf('jotform') > -1) ? true : false;
                      if(isJotForm && 'contentWindow' in iframe && 'postMessage' in iframe.contentWindow) {
                        var urls = {'docurl':encodeURIComponent(document.URL),'referrer':encodeURIComponent(document.referrer)};
                        iframe.contentWindow.postMessage(JSON.stringify({'type':'urls','value':urls}), '*');
                      }
                    };
                    if (window.addEventListener) {
                      window.addEventListener('message', handleIFrameMessage, false);
                    } else if (window.attachEvent) {
                      window.attachEvent('onmessage', handleIFrameMessage);
                    }
                  </script>";
                  }
                  else if ($row["skill"] == 'i') {
                    echo "<iframe
                    id='JotFormIFrame-202953789355166'
                    title='One on One Appointments'
                    onload='window.parent.scrollTo(0,0)'
                    allowtransparency='true'
                    allowfullscreen='true'
                    allow='geolocation; microphone; camera'
                    src='https://form.jotform.com/202953789355166'
                    frameborder='0'
                    style='
                    min-width: 100%;
                    height:539px;
                    border:none;'
                    scrolling='no'
                  >
                  </iframe>
                  <script type='text/javascript'>
                    var ifr = document.getElementById('JotFormIFrame-202953789355166');
                    if(window.location.href && window.location.href.indexOf('?') > -1) {
                      var get = window.location.href.substr(window.location.href.indexOf('?') + 1);
                      if(ifr && get.length > 0) {
                        var src = ifr.src;
                        src = src.indexOf('?') > -1 ? src + '&' + get : src  + '?' + get;
                        ifr.src = src;
                      }
                    }
                    window.handleIFrameMessage = function(e) {
                      if (typeof e.data === 'object') { return; }
                      var args = e.data.split(':');
                      if (args.length > 2) { iframe = document.getElementById('JotFormIFrame-' + args[(args.length - 1)]); } else { iframe = document.getElementById('JotFormIFrame'); }
                      if (!iframe) { return; }
                      switch (args[0]) {
                        case 'scrollIntoView':
                          iframe.scrollIntoView();
                          break;
                        case 'setHeight':
                          iframe.style.height = args[1] + 'px';
                          break;
                        case 'collapseErrorPage':
                          if (iframe.clientHeight > window.innerHeight) {
                            iframe.style.height = window.innerHeight + 'px';
                          }
                          break;
                        case 'reloadPage':
                          window.location.reload();
                          break;
                        case 'loadScript':
                          var src = args[1];
                          if (args.length > 3) {
                              src = args[1] + ':' + args[2];
                          }
                          var script = document.createElement('script');
                          script.src = src;
                          script.type = 'text/javascript';
                          document.body.appendChild(script);
                          break;
                        case 'exitFullscreen':
                          if      (window.document.exitFullscreen)        window.document.exitFullscreen();
                          else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
                          else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
                          else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
                          else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
                          break;
                      }
                      var isJotForm = (e.origin.indexOf('jotform') > -1) ? true : false;
                      if(isJotForm && 'contentWindow' in iframe && 'postMessage' in iframe.contentWindow) {
                        var urls = {'docurl':encodeURIComponent(document.URL),'referrer':encodeURIComponent(document.referrer)};
                        iframe.contentWindow.postMessage(JSON.stringify({'type':'urls','value':urls}), '*');
                      }
                    };
                    if (window.addEventListener) {
                      window.addEventListener('message', handleIFrameMessage, false);
                    } else if (window.attachEvent) {
                      window.attachEvent('onmessage', handleIFrameMessage);
                    }
                  </script>";
                  }
                  else if ($row["skill"] == 'a') {
                    echo "<iframe
                    id='JotFormIFrame-202953836240152'
                    title='One on One Appointments'
                    onload='window.parent.scrollTo(0,0)'
                    allowtransparency='true'
                    allowfullscreen='true'
                    allow='geolocation; microphone; camera'
                    src='https://form.jotform.com/202953836240152'
                    frameborder='0'
                    style='
                    min-width: 100%;
                    height:539px;
                    border:none;'
                    scrolling='no'
                  >
                  </iframe>
                  <script type='text/javascript'>
                    var ifr = document.getElementById('JotFormIFrame-202953836240152');
                    if(window.location.href && window.location.href.indexOf('?') > -1) {
                      var get = window.location.href.substr(window.location.href.indexOf('?') + 1);
                      if(ifr && get.length > 0) {
                        var src = ifr.src;
                        src = src.indexOf('?') > -1 ? src + '&' + get : src  + '?' + get;
                        ifr.src = src;
                      }
                    }
                    window.handleIFrameMessage = function(e) {
                      if (typeof e.data === 'object') { return; }
                      var args = e.data.split(':');
                      if (args.length > 2) { iframe = document.getElementById('JotFormIFrame-' + args[(args.length - 1)]); } else { iframe = document.getElementById('JotFormIFrame'); }
                      if (!iframe) { return; }
                      switch (args[0]) {
                        case 'scrollIntoView':
                          iframe.scrollIntoView();
                          break;
                        case 'setHeight':
                          iframe.style.height = args[1] + 'px';
                          break;
                        case 'collapseErrorPage':
                          if (iframe.clientHeight > window.innerHeight) {
                            iframe.style.height = window.innerHeight + 'px';
                          }
                          break;
                        case 'reloadPage':
                          window.location.reload();
                          break;
                        case 'loadScript':
                          var src = args[1];
                          if (args.length > 3) {
                              src = args[1] + ':' + args[2];
                          }
                          var script = document.createElement('script');
                          script.src = src;
                          script.type = 'text/javascript';
                          document.body.appendChild(script);
                          break;
                        case 'exitFullscreen':
                          if      (window.document.exitFullscreen)        window.document.exitFullscreen();
                          else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
                          else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
                          else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
                          else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
                          break;
                      }
                      var isJotForm = (e.origin.indexOf('jotform') > -1) ? true : false;
                      if(isJotForm && 'contentWindow' in iframe && 'postMessage' in iframe.contentWindow) {
                        var urls = {'docurl':encodeURIComponent(document.URL),'referrer':encodeURIComponent(document.referrer)};
                        iframe.contentWindow.postMessage(JSON.stringify({'type':'urls','value':urls}), '*');
                      }
                    };
                    if (window.addEventListener) {
                      window.addEventListener('message', handleIFrameMessage, false);
                    } else if (window.attachEvent) {
                      window.attachEvent('onmessage', handleIFrameMessage);
                    }
                  </script>";
                  }
              }
            }
        ?>
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
