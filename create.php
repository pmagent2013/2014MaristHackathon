<?php ?>
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

   <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  </head>
  <body>
    <form data-abide>
  <div class="name-field">
    <label>Username <small>required</small>
      <input type="text" required pattern="[a-zA-Z]+">
    </label>
    <small class="error">Name is required and must be a string.</small>
  </div>

  <div class="password-field">
    <label>Password <small>required</small>
      <input type="password" required pattern="[a-zA-Z]+">
    </label>
    <small class="error">Password is required and must be a string.</small>
  </div>
  <div class="email-field">
    <label>Email <small>required</small>
      <input type="email" required>
    </label>
    <small class="error">An email address is required.</small>
  </div>
  <button type="submit">Submit</button>
</form>
  


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
