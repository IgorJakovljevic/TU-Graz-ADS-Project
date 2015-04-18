var AjaxRequests = {
    
    getFiles : function(htmlNodeElement){
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
        
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        var result = JSON.parse(xmlhttp.responseText);
        var itemsLength = result.files.length;
        var DOMElement = document.getElementById(htmlNodeElement);
        for(var i = 0; i < itemsLength; i++){           
            if(result.files[i].fileType === "1"){
                DOMElement.innerHTML += '<img class="image" src="'+result.files[i].location + '"/>';
            }
            
            if(result.files[i].fileType === "2"){
            var audioElement = "";
            audioElement += '<audio class="audio" controls>';
            audioElement += '<source src="';
            audioElement += result.files[i].location;
            audioElement += '" type="audio/mpeg" />';
            audioElement += '</audio>';
            DOMElement.innerHTML += audioElement;
            }
            
            if(result.files[i].fileType === "3"){
            var videoElement = "";
            videoElement += '<video class="video" controls>';
            videoElement += '<source src="';
            videoElement +=  result.files[i].location;
            videoElement += '" type="video/mp4">';
            videoElement += '</video>';
            DOMElement.innerHTML += videoElement;
            }
            
            DOMElement.innerHTML += "<br/><br/>";
        }
        }
      }
    xmlhttp.open("GET","./Scripts/file.php",true);
    xmlhttp.send();
    }
};