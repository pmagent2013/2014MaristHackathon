<?php
function note($query){
	$query = mysql_query("SELECT DISTINCT files.name, fileTags.tag, files.fid FROM files, fileTags WHERE tag LIKE '%$query%' AND files.fid = fileTags.fid AND uid = '".$_SESSION['uid']."' GROUP BY name LIMIT 100");
	$counter = 0;
    while($row = mysql_fetch_array($query)){
		echo '<li style="padding:5px;">
			<a href="#Note&fid='.$row['fid'].'">
				<div class="row text-center">
					<h3>'.date("m/d/y g:i a", filemtime('uploads/'.$file)).'</h3>
					<img style="max-width:225px; max-height:400px;" src="uploads/'.$row['name'].'">
				</div>
			</a>
		</li>';
			$counter++;
    }
	if($counter == 0){
		echo "</ul></div><hr><center><font color='red'>We found no results.</font><hr>";
	}elseif($counter == 100){
		echo "</ul></div><hr><center><font color='red'>Limited to 100 results... Be more specific.</font><center><hr>";
	}
}

$toSearch = parameter('query');	
?>


<center><h1> Results Found Matching: <?php echo $toSearch; ?></h1></center>
<div class="row text-center">
		<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
			<?php note($toSearch); ?>
		</ul>
</div>