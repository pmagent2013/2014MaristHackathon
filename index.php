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
   <nav class="top-bar" data-topbar="" role="navigation">
  <!-- Title -->
  <ul class="title-area">
    <li class="name"><h1><a href="#">Sexy Top Bar</a></h1></li>

    <!-- Mobile Menu Toggle -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <!-- Top Bar Section -->
  
<section class="top-bar-section">

    <!-- Top Bar Left Nav Elements -->
    <ul class="left">

      <!-- Search | has-form wrapper -->
      <li class="has-form">
        <div class="row collapse">
          <div class="large-8 small-9 columns">
            <input type="text" placeholder="Find Stuff">
          </div>
          <div class="large-4 small-3 columns">
            <a href="#" class="alert button expand">Search</a>
          </div>
        </div>
      </li>
      <li class="has-form">
        <a class="button">Test</a>
      </li>
    </ul>

    <!-- Top Bar Right Nav Elements -->
    <ul class="right">
      <!-- Divider -->
      <li class="divider"></li>

      <!-- Dropdown -->
      <li class="has-dropdown not-click"><a href="#">Item 1</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Item 1</a></li>
          <li><label>Level One</label></li>
          <li><a href="#">Sub-item 1</a></li>
          <li><a href="#">Sub-item 2</a></li>
          <li class="divider"></li>
          <li><a href="#">Sub-item 3</a></li>
          <li class="has-dropdown not-click"><a href="#">Sub-item 4</a>

            <!-- Nested Dropdown -->
            <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Sub-item 4</a></li>
              <li><label>Level Two</label></li>
              <li><a href="#">Sub-item 2</a></li>
              <li><a href="#">Sub-item 3</a></li>
              <li><a href="#">Sub-item 4</a></li>
            </ul>
          </li>
          <li><a href="#">Sub-item 5</a></li>
        </ul>
      </li>

      <li class="divider"></li>

      <!-- Anchor -->
      <li><a href="#">Generic Button</a></li>
      <li class="divider"></li>

      <!-- Button -->
      <li class="has-form show-for-large-up">
        <a href="http://foundation.zurb.com/docs" class="button">Get Lucky</a>
      </li>
    </ul>
  </section></nav>
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
