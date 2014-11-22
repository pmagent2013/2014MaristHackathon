<?php
$execution_time = microtime();
date_default_timezone_set("America/New_York");

function databaseConnect($database = "hackathon_db"){
	$con = mysql_connect("localhost","hackathon","intelligent");
	if (!$con){ 
		die(errorDisplay('Could not connect: ' . mysql_error(), '***EXTREME***')); 
	}
	mysql_select_db($database, $con);
}
databaseConnect();  //Make an active connection to the database