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


function parameter($parameter, $form = '0')
{
    if ($form == 0) {
        if (isset($_GET[$parameter])) {
            return ($_GET[$parameter]);
            exit;
        }
        if (isset($_POST[$parameter])) {
            return ($_POST[$parameter]);
            exit;
        }
        if (isset($_COOKIE[$parameter])) {
            return ($_COOKIE[$parameter]);
            exit;
        }
    } elseif ($form == 1) {
        if (parameter($parameter) != "") {
            return decrypt(parameter($parameter));
        }
    }
    return false;
}


function encrypt($text)
{
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $key = "K";
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
        return encodeURIComponent(rawurlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, "|||" . $text . "|||", MCRYPT_MODE_ECB, $iv))));
    } else {
        return rawurlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, "|||" . $text . "|||", MCRYPT_MODE_ECB, $iv)));
    }
}


function websiteLastUpdated()
{
    $path = realpath($_SERVER['DOCUMENT_ROOT']);
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($objects as $name => $object) {
        $filetime[] = filemtime($name);
    }
    $filetime = max($filetime);
    return timeago($filetime);
}

function decrypt($text)
{
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $key = "K";
    $out = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_ECB, $iv));
    return substr($out, 3, last_index_of("|||", $out) - 6);
}

function timeTotal($ptime)
{
    $etime = $ptime;
    if ($etime < 1) {
        return '0 seconds';
    }
    $a = array( //24 * 60 * 60 * 30 *12   =>  'year',
        //24 * 60 * 60 * 30       =>  'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d, 2);
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}

function timeago($ptime)
{
    $etime = time() - $ptime;
    if ($etime < 1) {
        return '0 seconds';
    }
    $a = array(24 * 60 * 60 * 30 * 12 => 'year',
        24 * 60 * 60 * 30 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}


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


function getBetween($content=NULL,$start=NULL,$end=NULL){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
	if ($start==""){
        $r = explode($end, $content);
        return $r[0];
    }
    return 'Not Found';
}


function readImageForText($filename){
	$url_listindexes = 'https://api.idolondemand.com/1/api/sync/ocrdocument/v1';
	$params1 = 'url=http://hackathon.gavalchin.com/live/uploads/'.$filename.'&mode=scene_photo&apikey=8e025234-2c19-4af9-b337-40803dfdd176';
	$response = file_get_contents($url_listindexes .'?'.$params1);
	$response = getBetween($response, '"text": "', '",');
	$response = str_replace('\n', ' ', $response);
	return $response;
}



// -------------------------------------------- Data Handling sections in here --------------------------------------------------------
