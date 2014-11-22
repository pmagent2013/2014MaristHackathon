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
function uploadFile(file){

  var xhr = new XMLHttpRequest();

  var formData = new FormData();

  formData.append('file',file);

  xhr.upload.addEventListener("progress", function(e) {

    if (e.lengthComputable) {

        var percentage = Math.round((e.loaded * 100) / e.total);

        $("#progressbar").progressbar("value",percentage);

                $("#percentage").html(percentage+"%");

    }

  }, false);

                 

  xhr.upload.addEventListener("loadstart", function(e){

    $("#progressbar").show();

    $("#percentage").show();

  }, false);

  

  xhr.upload.addEventListener("load", function(e){

    $("#progressbar").progressbar("value",100);

    $("#percentage").html("100% Done");

  }, false);

  xhr.open("POST", "upload.php");

  xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');

  xhr.send(formData);

}

function handleFile(files){

  var fileReader=new FileReader();

  var file=files[0];

  var imageElem=document.createElement("img");

  fileReader.onload = (function(img) { return function(e) { img.src = e.target.result; }; })(imageElem);

  fileReader.readAsDataURL(file);

  document.getElementById("images").appendChild(imageElem);

  uploadFile(file);

}




            

  $(function() {
    $("#progressbar").progressbar({ value: 0});

    var uploadLink = $("#uploadlink");

    var fileSelect = $("#upload");

    uploadLink.click(function(e){

     e.preventDefault(); //prevent default action

      if (fileSelect)

        fileSelect.click();

    });

  });

</script>

		
  </head>
  <body>

   <style type="text/css">

    #images img{

     width:300px;

     height:auto;

     border:3px solid #FFFFFF;

    }

    #uploadlink{

     display:block;

     text-decoration:none;

     border:none;

     background:#21445B;

     color:#F2F2F2;

     padding:10px;

     width:150px;

    font-size:20px;

     font-weight:bold;

     text-align:center;

     border-radius:15px;

     box-shadow:0px 0px 5px #999999;

    }

    #uploadlink:active{

     background:#4CB6B8;

     color:#000000;

    }

  </style>

 

 

  <div id="parent" style="width:640px;margin:auto;background:#F2F2F2;box-shadow:0px 0px 5px #888888;padding:20px;">

    <form>

      <a href="#" id="uploadlink">Select File</a>

      <input style="display:none" type="file" id="upload" accept="image/*" onchange="handleFile(this.files)" name="file"><br>

    </form>

    <div id="images"></div>

    <div id="progressbar" style="display:none; width:350px; margin-top:10px;"></div>

    <span id="percentage" style="display:none; padding:10px; font-weight:bold; font-size:20px;"></span>

  </div>

 




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
