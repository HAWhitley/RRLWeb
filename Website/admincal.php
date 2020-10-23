<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Calendar</title>
    <link href="jquery-ui.min.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>
</head>
<body>
    <h2>This is the Administrator Calendar</h2>
    <a href="adminindex.php">Home</a>
    <a href="admincal.php">Schedule an Appointment</a>
    <a href="index.php">Log Out</a>
    <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
      <input type='submit' class="button" name='one' value='One on One Appointments'>
      <input type='submit' class="button" name='beginner' value='Beginner Group Appointments'>
      <input type='submit' class="button" name='intermediate' value='Intermediate Group Appointments'>
      <input type='submit' class="button" name='advanced' value='Advanced Group Appointments'><br> <br>
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
        $single = $_POST['one'];
        $bgroup = $_POST['beginner'];
        $igroup = $_POST['intermediate'];
        $agroup = $_POST['advanced'];
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
        if(isset($bgroup)) {
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
        if(isset($igroup)) {
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
        if(isset($agroup)) {
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
    ?>
</body>
</html>