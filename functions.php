<?php
if(!$_SESSION['authorized']){
   if(isset($_POST['Login'])){ // if login form submitted
	   if($_POST['login_user'] !== ""){
			header('Location: index.php#login&error=No+User+Given');
	   }
	   if($_POST['pass'] !== ""){
			header('Location: index.php#login&error=No+Pass');
	   }
	   $numRecords = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'COUNT(*)');
	   if($numRecords == "0"){
			header('Location: index.php#login&error=User+Does+Not+Exist');
		}
      $pass = $_POST['pass']; //sets password variable
	  $Password = mysql_result(mysql_query("SELECT `password` FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'password');
		  if ($pass === $Password) { //error, wrong password
			$_SESSION['authorized'] = TRUE;
			$_SESSION['uid'] = mysql_result(mysql_query("SELECT uid FROM `users` WHERE `username` = '".$_POST['login_user']."'"), 0, 'uid');
			header('Location: index.php#Home');
		  }else{ 
			header('Location: index.php#login&error=Wrong+Password+or+Username');
		  }
   }
}

?>
