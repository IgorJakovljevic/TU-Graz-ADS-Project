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
<nav>
</nav>
<?php if(!isSet($_SESSION['userId'])){ ?>
<div>Login to use the page</div>
<a href="UI/_administration.php">Login</a>
<?php }?>
<div id="content">
    
</div>
 <a href="google.com">Google.com</a>
<?php if(isSet($_SESSION['userId'])){ ?>
<script>
    AjaxRequests.getFiles("content");
</script> 
<?php }?>
    
</body>
</html>