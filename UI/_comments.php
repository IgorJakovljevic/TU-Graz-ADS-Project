<?php
session_start();
define('__ROOT__', dirname(dirname(__FILE__))); 
require (__ROOT__.'/Scripts/UI_helper.php');
?>
<!DOCTYPE HTML>
<html>

<head>

</head>

<body>
    <?php if(isSet($_SESSION['userId'])){ ?>
    <form action="../Scripts/comments.php" method="POST">
        <input name="fileId" type="text"> 
        <input name="content" type="text" placeholder="Description">
        <button>Create new</button>
    </form>
    <?php } else {?>
    <div>You must login to add new files.</div>
    <a href="../UI/_administration.php">Login</a>
    <?php } ?>
</body>
</html>