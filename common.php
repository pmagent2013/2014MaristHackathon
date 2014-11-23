<?php
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL);
ini_set('display_errors', '1');
$execution_time = microtime();
session_start();
date_default_timezone_set("America/New_York");

function databaseConnect($database = "hackathon_db"){
	$con = mysql_connect("localhost","hackathon","intelligent");
	if (!$con){ 
		die(errorDisplay('Could not connect: ' . mysql_error(), '***EXTREME***')); 
	}
	mysql_select_db($database, $con);
}
databaseConnect();  //Make an active connection to the database
include_once('functions.php');

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

function websiteLastUpdated(){
	$path = realpath($_SERVER['DOCUMENT_ROOT']);
	$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
	foreach($objects as $name => $object){
		$filetime[]=filemtime($name);
	}
	$filetime=max($filetime);
	return lastUpdated($filetime);
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
	mysql_query("INSERT INTO `files` (`uid`, `name`) VALUES ('".$_SESSION['uid']."', '".$filename."')");
	$url_listindexes = 'https://api.idolondemand.com/1/api/sync/ocrdocument/v1';
	$params1 = 'url=http://hackathon.gavalchin.com/live/uploads/'.$filename.'&mode=scene_photo&apikey=8e025234-2c19-4af9-b337-40803dfdd176';
	$response = file_get_contents($url_listindexes .'?'.$params1);
	$response = getBetween($response, '"text": "', '",');
	$response = str_replace('\n', ' ', $response);
	$tags = explode(" ", $response);
	$fid = mysql_result(mysql_query("SELECT `fid` FROM `files` WHERE `uid` = '".$_SESSION['uid']."' ORDER BY `uploadTime` DESC"), 0, 'fid');
	mysql_query("INSERT INTO `classFiles` (`cid`, `fid`) VALUES ('4', '".$fid."')");
	foreach($tags as $tag){
		mysql_query("REPLACE INTO `fileTags` (`fid` ,`tag`)VALUES ('".$fid."',  '".$tag."')");
	}
	return $response;
}

function byteFormat($bytes, $unit = "", $decimals = 2) {
	$units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4, 
			'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);
 
	$value = 0;
	if ($bytes > 0) {
		// Generate automatic prefix by bytes 
		// If wrong prefix given
		if (!array_key_exists($unit, $units)) {
			$pow = floor(log($bytes)/log(1024));
			$unit = array_search($pow, $units);
		}
 
		// Calculate byte value by prefix
		$value = ($bytes/pow(1024,floor($units[$unit])));
	}
 
	// If decimals is not numeric or decimals is less than 0 
	// then set default value
	if (!is_numeric($decimals) || $decimals < 0) {
		$decimals = 2;
	}
 
	// Format output
	return sprintf('%.' . $decimals . 'f '.$unit, $value);
  }



// -------------------------------------------- Data Handling sections in here --------------------------------------------------------
