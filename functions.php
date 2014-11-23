<?php 
if(!$_SESSION['logged_in']){
   if(mysql_result(mysql_query("SELECT `password` FROM `sites` WHERE `realm` = '".$realm."'"), 0, 'password') == ""){
	   setPass();
	   exit();
   }
   if (isset($_POST['Log In'])){ // if login form submitted
      $pass = isset($_POST['pass']) ? $_POST['pass'] : ''; //sets password variable
      
	  $Password = mysql_result(mysql_query("SELECT `password` FROM `sites` WHERE `realm` = '".$realm."'"), 0, 'password');
      if (md5($pass) != $Password) { //error, wrong password
         header('Location: index.php/#login&error=Wrong+Password');
         exit();     
      }
	  $_SESSION['authorized']=TRUE;
	  header('Location: index.php');
	  exit;
   } else { //
      showForm();
      exit();
   }
}

?>
