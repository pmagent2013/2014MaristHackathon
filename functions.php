<?php 
if(!$_SESSION['authorized']){
   if(isset($_POST['Login'])){ // if login form submitted
      $pass = isset($_POST['pass']) ? $_POST['pass'] : ''; //sets password variable
	  $Password = mysql_result(mysql_query("SELECT `password` FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'password');
	  if($_POST['login_user'] != ""){
		header('Location: index.php#login&error=No+User+Given');
	  }
      if ($pass != $Password) { //error, wrong password
         header('Location: index.php#login&error=Wrong+Password+or+Username');   
      }else{
		$_SESSION['authorized'] = TRUE;
		header('Location: index.php#Home');
	  }
   }
}

?>
