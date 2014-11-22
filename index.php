<?php include_once('common.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MaristNotes</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">

   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

   <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script>
function showThumbnails(){
 
  var files= document.getElementById('file').files;
  
  $('#previewPane').html('');
 
  for(var i=0;i<files.length;i++){
 
    var file=files[i];
 
    var image = document.createElement("img");
        
    $('#previewPane').append('<li id="photo' + i + '">');
    
    $('#photo' +i).append(image);
    
    $('#photo' +i).append('<div id="progress'+ i +'" class="progress large-12 medium-12 success round"><span class="meter" style="width: 0%"></span></div>');
    

    var fileReader= new FileReader();
 
    fileReader.onload = (function(img) { return function(e) { img.src = e.target.result; }; })(image);
 
    fileReader.readAsDataURL(file);
    
    uploadFile(file, i); 
  }
 
}



function uploadFile(file, i){ 
  var xhr = new XMLHttpRequest(); 
  var formData = new FormData();
 
  formData.append('file',file);
 
  xhr.upload.addEventListener("progress", function(e) { 
    if (e.lengthComputable) { 
        var percentage = Math.round((e.loaded * 100) / e.total); 
        $("#progress" + i).html('<span class="meter" style="width: '+ percentage +'%"></span>');
    } 
  }, false);
 
  xhr.upload.addEventListener("load", function(e){
 
    $("#progress" + i).html('<span class="meter" style="width: 100%">Complete</span>');;
 
  }, false);
 
  xhr.open("POST", "upload.php"); 
 
  xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');
 
  xhr.send(formData);
 
}
	</script>
	
	
	
	  <div class="row">
    <div class="large-12 medium-12">

    <form>
      <fieldset>
      <legend>Photos</legend>
	<input type="file" id="file" accept="image/*" name="file" value="Upload a Image" class="button" onchange="showThumbnails()"/>
      </fieldset>
	</form>
	
	<div id="preview">
	  <ul id="previewPane" class="medium-block-grid-3 large-block-grid-4">
	  	  
	  </ul>
	</div>
    </div>    
</div>     



    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
