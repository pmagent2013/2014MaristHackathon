<?php include_once('common.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MaristNotes</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="js/ajax.js"></script>
   <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
   <script src="js/ajax.js"></script>
   </head>
   <body>
 <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="#Home"><img src="img/NavLogo2.png"></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li><a href="#Home"><img src="img/home.png"><a></li>
                <li><a href="#RecentChanges"><img src="img/recent.png"></a></li>
                <li>
                <li class="has-dropdown not-click"><a><img src="img/media.png"></a>
                    <ul class="dropdown dropdown-wrapper">
                        <li>
                            <div>
                                <div class="small-6 columns">
                                    <ul>
                                        <li>
                                            <h3>Movies</h3>
                                        </li>
                                        <li class="active"><a href="#Movies&type=Recent">Recently Updated</a></li>
                                        <!--<li><a href="#Movies&type=Requested">Requested</a></li>-->
                                        <li class=""><a href="#Movies&type=MostViewed">Most Viewed Movies</a></li>
                                        <li><a href="#Movies">All Movies →</a></li>
                                    </ul>
                                </div>
                                <div class="small-6 columns">
                                    <ul>
                                        <li>
                                            <h3>TV-Shows</h3>
                                        </li>
                                        <li class="active"><a href="#TV-Shows&type=Recent">Recently Updated</a></li>
                                        <!--<li><a href="#TV-Shows&type=Requested">Requested</a></li>-->
                                        <li class=""><a href="#TV-Shows&type=MostViewed">Most Viewed TV-Shows</a></li>
                                        <li><a href="#TV-Shows">All TV-Shows →</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--<li><a href="#Statistics">Statistics</a></li>
                <li class="divider">
                <li><a href="#FAQ">F.A.Q.</a></li>
                <li class="divider">
                <li><a href="#About">About Us</a></li>
                <li class="divider">-->
                <li><a href="#Requests"><img src="img/requests.png"></a></li>
                <li class="has-form hide-for-touch">
                    <input type="text" placeholder="Search Media" onkeyup="window.history.pushState('', 'Location', '#Search&query='+ this.value)">
              </li>



            </ul>
            <ul class="right">
            <!-- ADMIN BAR -->
                
                <li class="has-dropdown not-click"><a href="#"><img src="img/admin.png"></a>
                    <ul class="dropdown">
                        <li class="has-dropdown not-click">
                            <a href="">Keys</a>
                            <ul class="dropdown">
                                <li><a href="#CreateKey">Create</a></li>
                                <li><a href="#LookupKey">Lookup</a></li>
                                <li><a href="#GlobalKeys">Global</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown not-click">
                            <a href="">View</a>
                            <ul class="dropdown">
                                <li><a href="#ViewUsers">Users</a></li>
                                <li><a href="#ViewRequests">Requests</a></li>
                                <li><a href="#ViewReports">Reports</a></li>
                            </ul>
                        </li>
                        <li><a href="#CreateNews">Create News</a></li>
                    </ul>
                <li>

                    <!--<li class="active"><a href="#ServerStatus">7/7 Online</a></li>-->
                <li class=""><a href="#Report"><img src="img/report.png"></a></li>
                <li class="has-dropdown not-click"> <a><img src="img/settings.png"></a>
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
<div id="footer"> &copy;2007-<?php echo date("Y") ?> Int elligent  - All Rights Reserved | Generated In: <span id="loadtime">NULL</span> | Last Updated <span id="lastupdated">NULL</span>
    </p>
</div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
