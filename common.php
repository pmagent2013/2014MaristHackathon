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
