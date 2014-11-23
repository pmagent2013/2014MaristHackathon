<?php $file = mysql_result(mysql_query("SELECT `name` FROM `files` WHERE `uid` = '".$_SESSION['uid']."' AND `fid` = '".$_POST['fid']."' "), 0, 'name');
$tagsNum = mysql_result(mysql_query("SELECT COUNT(*) FROM `fileTags` WHERE `fid` = '".$_POST['fid']."'"), 0, 'COUNT(*)');
 ?>
<div class="row">
<h2> Note Details </h2>
</div>
<div class="row">
	<ul class="small-block-grid-1 large-block-grid-1">
		<a href="uploads/<?php echo $file; ?>">
			<li><img class="th" style="max-width:80%; max-height:80%;" src="uploads/<?php echo $file; ?>"></li>
		</a>
	</ul>
</div>
<div class="row">
	<h2> Image Information </h2>
	<div class="large-12 columns">
			<div class="panel">
				<p>Size: <?php echo byteFormat(filesize('uploads/'.$file), "MB"); ?><br>Date Uploaded: <?php echo date("F j, Y, g:i a", filemtime('uploads/'.$file)); ?><br>Tags Found: <?php echo $tagsNum ?></p>
			</div>
	</div>
</div>
<div class="row">
	<h2> Raw Text Output </h2>
	<div class="large-12 columns">
			<div class="panel">
				<p><?php include('uploads/'.substr($file, 0, -4).'.txt'); ?></p>
			</div>
	</div>
	