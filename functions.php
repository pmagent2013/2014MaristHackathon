<?php 
if(!$_SESSION['authorized']){
   if(isset($_POST['login'])){ // if login form submitted
   echo "YES";
      $pass = isset($_POST['pass']) ? $_POST['pass'] : ''; //sets password variable
      
	  $Password = mysql_result(mysql_query("SELECT `password` FROM `users` WHERE `username` = '".$_POST['user']."'"), 0, 'password');
      if (md5($pass) != $Password) { //error, wrong password
         header('Location: index.php/#login&error=Wrong+Password');   
      }
	  $_SESSION['authorized']=TRUE;
	  header('Location: index.php');
   }
}

?>
