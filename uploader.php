<?php
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
 
    $("#progress" + i).html('<span class="meter" style="width: 100%"></span>');;
 
  }, false);
 
  xhr.open("POST", "upload.php"); 
 
  xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');
 
  xhr.send(formData);
 
}
?>