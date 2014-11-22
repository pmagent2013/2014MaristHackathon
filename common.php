<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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

//-------------- Check if $_POST variables sent ---------------------
if(isset($_POST['upload'])){ upload(); }




function errorDisplay($errorMessage = NULL, $Severity = NULL){ 
	//This function displays any pre-defined trace errors to be called
	//Any other errors will be recorded in the apache logs
	echo "<center>";
	if($Severity == "LOW"){
		echo "<div id='errorReport' style='color:blue;background-color:yellow;align:center;'>".$errorMessage."</div>";
	}elseif($Severity == "MEDIUM"){
		echo "<div id='errorReport' style='color:purple;background-color:orange;align:center;'>".$errorMessage."</div>";
	}else{
		echo "<div id='errorReport' style='color:black;background-color:red;align:center;'>".$errorMessage."</div>";
	}
	logToFile("Client '".$_SERVER['REMOTE_ADDR']."' ".$errorMessage, $Severity); //logs the error to the Errors.txt for later debugging
	echo "<div id='errorReport'><b>This error has been logged...</b>&nbsp;&nbsp;&nbsp;<u>Sorry for the Inconvenience</u></div></center>";
}

function logToFile($msg = NULL, $Severity = NULL){ 
   		$fd = fopen("Error.txt", "a");
   		$str = "[".date("Y/m/d h:i:s", time())."] (".$Severity.") ".$msg; 
		fwrite($fd, $str . "\n");
   		fclose($fd);
   }
   
function displayIcon($icon = NULL){
	$filename = "imgs/icons/".$icon.".png";
	if (file_exists($filename)) {
		echo "<img src='".$filename."' border='0' style='display:inline-block;' />";
	}else{
		errorDisplay("'".$icon."' ICON DOES NOT EXIST IN '".getcwd()."(".$filename.")' ", "LOW");
	}
   }
   
   
function debug($var = false) {
  echo "\n<pre style=\"background: #FFFF99; font-size: 10px;\">\n";
  $var = print_r($var, true);
  echo $var . "\n</pre>\n";
}

function multiexplode ($delimiters,$string){
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function websiteLastUpdated(){
	$path = realpath($_SERVER['DOCUMENT_ROOT']);
	$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
	foreach($objects as $name => $object){
		$filetime[]=filemtime($name);
	}
	$filetime=max($filetime);
	return lastUpdated($filetime);
}

function caculateLoadTime(){
	global $execution_time;
	$execution_time = microtime() - $execution_time;
	return sprintf('Page generated in <span id="loadtime">%.5f</span>', $execution_time);
}

function lastUpdated($ptime) {
    $etime = time() - $ptime;
    if ($etime < 1) {
        return '0 seconds';
    }
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
				7  * 24 * 60 * 60       =>  'week',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '').' ago';
        }
    }
}

function addOrdinalNumberSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
        switch ($num % 10) {
            // Handle 1st, 2nd, 3rd
            case 1:  return $num.'st';
            case 2:  return $num.'nd';
            case 3:  return $num.'rd';
        }
    }
    return $num.'th';
}





// -------------------------------------------- Data Handling sections in here --------------------------------------------------------

function upload(){
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
}