<div style="">
	<div class="row">
	<?php if (isset($_POST['status'])){echo '<div data-alert class="alert-box alert">Issue Reported<a href="#" class="close">&times;</a></div>';}?>
		<form method="POST" action="index.php#Report&status=1">
			<div class="row text-center">
				<h1>Report Center</h1>
			</div>
			<div class="row">
				<textarea cols="10" rows="10" name="report_info" placeholder="Put Report in Here"></textarea>
			</div>
			<div class="row">
				<input type="submit" class="button small radius" value="Submit Report">
			</div>
		</form>
	</div>
</div>