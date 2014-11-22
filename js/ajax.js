var default_content="";
var sessionLength = 0;
$(document).ready(function(){
    checkURL();
    $('ul li a').click(function (e){ 
            checkURL(this.hash);
    });
    default_content = $('#pageContent').html();
    setInterval("keepSessionAlive()",60000);
    setInterval("checkURL()",250);
});
var lasturl="";
function checkURL(hash)
{
    if(!hash) hash = window.location.hash;
    if(hash == "#" || hash == ""){
    window.history.pushState("", "Location", "#Home");
    }
    if(hash != lasturl)
    {
		previous=lasturl;
        lasturl=hash;
        if(hash == ""){
        	$('#pageContent').html(default_content);
        }else{
          loadPage(hash, previous);
        }
    }
}
function loadPage(url, previous){
	loadtime.innerHTML = "<i>Pending</i>";
    url=url.replace('#',''); 
    $('body').css('overflow','auto');
    $.ajax({
        type: "POST",
        url: "loader.php",
        data: 'refferer='+window.location.protocol+'//'+window.location.host+window.location.pathname+previous+'&page='+url,
        dataType: "html",
        success: function(msg){
            if(parseInt(msg)!=0)
            {
                $('#pageContent').html(msg);

            }
        }
        
    });

}

function keepSessionAlive(){
	if(sessionLength <= 720){
		$.ajax({
			type: "POST",
			url: "common.php",
			dataType: "html",
			success: function(msg){
				if(parseInt(msg)!=0)
				{
					// all good here! :D
	
				}
				
			}
			
		});
	}else{
		// its been 12 hours, we're going to let the session die on its own
	}
}

function checkPlayerControlBar(){
	if(document.getElementById("KFS-video-id0_controls").style['cssText'] == 'display: block;'){
		document.getElementById("KFS-video-id0").style.cursor="default";
	}else{
		document.getElementById("KFS-video-id0").style.cursor="none";
	}
}