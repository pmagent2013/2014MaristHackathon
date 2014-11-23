<?php
if(!$_SESSION['authorized']){
   if(isset($_POST['Login'])){ // if login form submitted
	   if($_POST['login_user'] != ""){
			//header('Location: index.php#login&error=No+User+Given');
	   }
	   if($_POST['pass'] != ""){
			//header('Location: index.php#login&error=No+Pass');
	   }
	   $numRecords = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'COUNT(*)');
	   var_dump($numRecords);
	   if(mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'COUNT(*)') == 0){
			//header('Location: index.php#login&error=User+Does+Not+Exist');
		}
      $pass = $_POST['pass']; //sets password variable
	  $Password = mysql_result(mysql_query("SELECT `password` FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'password');
		  if ($pass != $Password) { //error, wrong password
			//header('Location: index.php#login&error=Wrong+Password+or+Username');
		  }else{ 
			$_SESSION['authorized'] = TRUE;
			//header('Location: index.php#Home');  
		  }
   }
}

?>
