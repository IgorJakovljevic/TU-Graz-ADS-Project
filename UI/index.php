<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<script type="text/javascript" src="../Scripts/Javascript/AJAX-Requests.js"></script>
</head> 
<body>
<nav id="navigation">
    <button id="home" onclick='AjaxRequests.getFiles("content")'></button>
    <?php if(!isSet($_SESSION['userId'])){ ?>
    <button id="login" onclick='AjaxRequests.setLoginForm("content")'></button>
    <?php } else {?>
     <button id="user" onclick='AjaxRequests.setUserForm("content")'></button>
     <button id="uploadfile" onclick='AjaxRequests.setUploadFileForm("content")'></button>
     <button id="logout" onclick='AjaxRequests.logoutUser()'>
    </button>
    <?php }?>

</nav>

<div id="content">
    
</div>
    
<div id="productOverview" style="margin:auto;display:none; background-color:white;">
<div style="width=100%;height:40px; text-align:right">
    <button class="exitButton" onclick="AjaxRequests.closePreview()">
    </button>
</div>
<div id="productContent" ></div>
<div id="comments"></div>
<textarea id="comment"></textarea><br/>
<button id="commentButton">Comment</button>
</div>   

<script>
    AjaxRequests.getFiles("content");
</script> 
  
</body>
</html>