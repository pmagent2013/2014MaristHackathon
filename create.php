<?php ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">

   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

   <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  </head>
  <body>
    <h1 class='row'>Create Account</h1>
    <form data-abide>
  <div class='row'>
  <div class="name-field">
    <div class='large-4 columns'>
    <label>Username <small>required</small>
      <input type="text" required pattern="[a-zA-Z]+">
    </label>
    <small class="error">Name is required and must be a string.</small>
  </div>
  </div>
</div>
  <div   class='row'>
  <div class="password-field">
    <div class='large-4 columns'>
    <label>Password <small>required</small>
      <input type="password" required pattern="[a-zA-Z]+">
    </label>
    <small class="error">Password is required and must be a string.</small>
  </div>
  </div>
</div>

<div class='row'>
  <div class="email-field">
    <div class='large-4 columns'>
    <label>Email <small>required</small>
      <input type="email" required>
    </label>
    <small class="error">An email address is required.</small>
  </div>
</div>
</div>
  <div class='row'>
  <button type="submit">Submit</button>
</div>
</form>
  


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
