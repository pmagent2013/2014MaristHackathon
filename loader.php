<?php
$mtime = microtime();
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;
include_once('common.php');
session_start();

    //die("<center><h1>Scheduled Maintenance. We are working to improve our backend!</h1></center>");
if(!parameter('page')) die("Error: page id not specified...Something Broke");

$page = parameter('page');
//if(($_SESSION['authorized'] == TRUE)){
	if(file_exists('pages/'.$page.'.txt')){
		include('pages/'.$page.'.txt');
	}else{
		echo '<div id="error" style="margin-top:20px;border:1px dashed #cccccc;padding:10px;-moz-border-radius: 5px;-khtml-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;color: red;font-family: LeagueGothicRegular;font-size: 24px;font-weight: lighter;text-align: center;">Aw, snap! Something went terribly wrong.<br>We couldnt find the page youre looking for.<br /><br /><iframe allowfullscreen="" style="height: 216px;width: 384px;" frameborder="0" src="//www.youtube.com/embed/t3otBjVZzT0?autohide=1&amp;autoplay=1&amp;color=white&amp;showinfo=0&amp;theme=light"></iframe></div>';
	}
/*} else {
	//not logged in
	if($page == "login" || $page == "create"){
		//allow other pages while not logged in
		if(file_exists('pages/'.$page.'.php')){
			include('pages/'.$page.'.php');
		}
	}else{
		//force login page
			include('pages/create.txt');
	}
}*/

function caculateLoadTime2($ms){
    $a = array( 1000                    =>  's',
                1                       =>  'ms'
                );
    foreach ($a as $secs => $str) {
        $d = $ms / $secs;
        if ($d >= 1) {
            $r = round($d, 2);
            return $r . '' . $str;
        }
    }
}

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime)*1000;
echo $totaltime;

if($totaltime > 20000) { echo "<script> alert('It appears we are under heavy load. As a result, the performance is degraded.'); </script>"; }
echo "<script> loadtime.innerHTML = '".caculateLoadTime2($totaltime)."';  lastupdated.innerHTML = '".websiteLastUpdated()."';";

?>