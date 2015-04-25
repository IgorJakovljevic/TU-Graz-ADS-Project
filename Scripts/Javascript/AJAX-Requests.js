var rootFolder = 'tu-graz-ads-project';

var AjaxRequests = {
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
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
        
           
        document.getElementById(htmlNodeElement).innerHTML = "";
        for(var i = 0; i < itemsLength; i++){ 
            var DOMElement =  document.createElement("div");
            DOMElement.setAttribute('id','file-'+result.files[i].id);
           
            if(result.files[i].fileType === "1"){
                DOMElement.setAttribute('class', 'image');
                DOMElement.innerHTML += '<img src="../'+result.files[i].location + '"/>';
                var deleteButton = document.createElement("button");
                deleteButton.setAttribute("onclick",'AjaxRequests.deleteFile("'+result.files[i].id+'")');
                DOMElement.appendChild(deleteButton);
            }
            
            if(result.files[i].fileType === "2"){
                DOMElement.setAttribute('class', 'audio');
                var audioElement = '<img src="Icons/note.png" height="240" width="260">';
                audioElement += '<audio controls>';
                audioElement += '<source src="../';
                audioElement += result.files[i].location;
                audioElement += '" type="audio/mpeg" />';
                audioElement += '</audio>';               
                DOMElement.innerHTML += audioElement;
                var deleteButton = document.createElement("button");
                deleteButton.setAttribute("onclick",'AjaxRequests.deleteFile("'+result.files[i].id+'")');
                 DOMElement.appendChild(deleteButton);
            }
            
            if(result.files[i].fileType === "3"){
            var videoElement = '';
            videoElement += '<video class="video" controls>';
            videoElement += '<source src="../';
            videoElement +=  result.files[i].location;
            videoElement += '" type="video/mp4">';
            videoElement += '</video>';
            DOMElement.innerHTML += videoElement;
            }
            
            document.getElementById(htmlNodeElement).appendChild(DOMElement);

        }
        }
      }
    xmlhttp.open("GET","/"+rootFolder+"/Scripts/file.php",true);
    xmlhttp.send();
    },
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    setNewUserForm : function(htmlNodeElement){
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
        var DOMElement = document.getElementById(htmlNodeElement);    
        var result = JSON.parse(xmlhttp.responseText);
        console.log(result);
        DOMElement.innerHTML = result.userForm;
        }
      }
    xmlhttp.open("GET","/"+rootFolder+"/ui/Partials/_user.php",true);
    xmlhttp.send();
    },
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    setLoginForm : function(htmlNodeElement){
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
        var DOMElement = document.getElementById(htmlNodeElement);    
        var result = JSON.parse(xmlhttp.responseText);
        console.log(result);
        DOMElement.innerHTML = result.userForm;
        }
      }
    xmlhttp.open("GET","/"+rootFolder+"/ui/Partials/_admin.php",true);
    xmlhttp.send();
    },
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////        
    setUploadFileForm : function(htmlNodeElement){
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
            var DOMElement = document.getElementById(htmlNodeElement);    
            var result = JSON.parse(xmlhttp.responseText);
            console.log(result);
            DOMElement.innerHTML = result.userForm;
            }
          }
        xmlhttp.open("GET","/"+rootFolder+"/ui/Partials/_uploadFile.php",true);
        xmlhttp.send();
    },
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////        
    createNewUser : function(){
        var requestString = "";
        
        var userName = document.getElementsByName('username')[0].value;
        requestString += "username="+userName;
        var firstName = document.getElementsByName('firstname')[0].value;
        requestString += "&firstname="+firstName;
        var lastName = document.getElementsByName('lastname')[0].value;
        requestString += "&lastname="+lastName;
        var password = document.getElementsByName('password')[0].value;
        requestString += "&password="+password;
        var email = document.getElementsByName('email')[0].value;
        requestString += "&email="+email;
        var phoneNumber = document.getElementsByName('phoneNumber')[0].value;
        requestString += "&phoneNumber="+phoneNumber;
        
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
             document.getElementById("content").innerHTML = "<h1>"+userName+" created!</h1>";
            }
          }

        xmlhttp.open("POST","/"+rootFolder+"/Scripts/user.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(requestString);      
    },
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////// 
    loginUser : function() {
        
         var requestString = "";
        
        var userName = document.getElementsByName('username')[0].value;
        requestString += "username="+userName;
        var password = document.getElementsByName('password')[0].value;
        requestString += "&password="+password;
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
             document.getElementById('login').remove();
                
             var logoutbutton = document.createElement("button");

             logoutbutton.setAttribute('onclick','AjaxRequests.logoutUser()')
             logoutbutton.setAttribute('id','logout')
             
             var uploadbutton = document.createElement("button");

             uploadbutton.setAttribute('onclick','AjaxRequests.setUploadFileForm("content")')
             uploadbutton.setAttribute('id','uploadfile')
             
             var userbutton = document.createElement("button");
             userbutton.setAttribute('id','user')
             
            document.getElementById('navigation').appendChild(userbutton);
             document.getElementById('navigation').appendChild(uploadbutton);
             document.getElementById('navigation').appendChild(logoutbutton);
                
             document.getElementById("content").innerHTML = "<h1>"+userName+" created!</h1>";
            }
          }

        xmlhttp.open("POST","/"+rootFolder+"/Scripts/administration.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(requestString);    
    },
    logoutUser : function() {
        
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
             document.getElementById('logout').remove();
             document.getElementById('user').remove();
             document.getElementById('uploadfile').remove();   
                
             var loginbutton = document.createElement("button");

             loginbutton.setAttribute('onclick','AjaxRequests.setLoginForm("content")')
             loginbutton.setAttribute('id','login');
                
             
             document.getElementById('navigation').appendChild(loginbutton);
             document.getElementById("content").innerHTML = "<h1> You have logged out.</h1>";
            }
          }

        xmlhttp.open("POST","/"+rootFolder+"/Scripts/administration.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();    
    },
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////// 
    updateFile : function() {
        var file = document.getElementById('file');
        var description = document.getElementsByName('description')[0].value;
        var fileType = document.getElementsByName('fileType')[0].value;

        
        if(file.files.length === 0){
            return;
        }

        var data = new FormData();
        data.append('file', file.files[0]);
        data.append('description', description);
        data.append('fileType', fileType);

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
             console.log(file.files[0]);
             document.getElementById("content").innerHTML = "<h1> File "+file.files[0].name+" has been uploaded!</h1>";
            }
          }

        xmlhttp.open("POST","/"+rootFolder+"/Scripts/file.php",true);
        //xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(data);    
    },
    
    deleteFile : function(id) {
        var file = document.getElementById('file-'+id).remove();

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
             console.log(file.files[0]);
             document.getElementById("content").innerHTML = "<h1> File "+file.files[0].name+" has been uploaded!</h1>";
            }
          }

        xmlhttp.open("DELETE","/"+rootFolder+"/Scripts/file.php?id="+id,true);
        //xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();    
    }
};