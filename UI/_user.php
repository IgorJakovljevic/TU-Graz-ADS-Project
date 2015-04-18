<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
<script type="text/javascript" src="Scripts/Javascript/AJAX-Requests.js"></script>
</head>

<body>
    <?php if(isSet($_SESSION['userId'])){ ?>
    <form action="../Scripts/type.php" method="POST">
        <input name="name" type="text" placeholder="File type name">
        <button>Create new</button>
    </form>
    <?php } else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'Errors/403.html';
    header("Location: http://$host$uri/$extra");
    } ?>
    
<script>
    AjaxRequests.getFiles("content");
</script> 
</body>
</html>