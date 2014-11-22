<?php include_once('common.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intelligence</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="js/ajax.js"></script>
   </head>
   <body>
 <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1 style="color: blue;"><b>Int-Elligence</b></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li><a href="#Home">Home</li>
				<li class="divider"></li>
                <li><a href="#RecentChanges">My Notes</li>
				<li class="divider"></li>
                <li><a href="#Statistics">Statistics</a></li>
                <li class="divider"></li>
                <!--<li><a href="#FAQ">F.A.Q.</a></li>
                <li class="divider">
                <li><a href="#About">About Us</a></li>
                <li class="divider">-->
                <li><a href="#Requests">Uncategorised Notes</li>
                <li class="has-form hide-for-touch">
                    <input type="text" placeholder="Search For Notes" onkeyup="window.history.pushState('', 'Location', '#Search&query='+ this.value)">
              </li>
            </ul>
            <ul class="right">
                    <!--<li class="active"><a href="#ServerStatus">7/7 Online</a></li>-->
                <li class=""><a href="#Report">Report An Issue</li>
                <li class="has-dropdown not-click">My Account</a>
                    <ul class="dropdown">
                        <li><a href="">Your Account</a></li>
                        <!--<li><a href="#ReffererCode">Refferer Code</a></li>
                        <li><a href="#Contact">Contact Us</a></li>-->
                        <li><a href="#Logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </nav>
<div id="pageContent">
    <noscript>
        <center>
            <h1 style="color:red;">Javascript is REQUIRED to use this website.</h1>
        </center>
    </noscript>
</div>
<div id="footer"> &copy;2007-<?php echo date("Y") ?> Int-elligence  - All Rights Reserved | Generated In: <span id="loadtime">NULL</span> | Last Updated <span id="lastupdated">NULL</span>
    </p>
</div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
