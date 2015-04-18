<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>

</head>

<body>
    <?php if(isSet($_SESSION['userId'])){ ?>
    <form action="../Scripts/type.php" method="POST">
        <input name="name" type="text" placeholder="File type name">
        <button>Create new</button>
    </form>
    <?php } else {?>
    <div>You must login to add new files.</div>
    <a href="../UI/_administration.php">Login</a>
    <?php } ?>
</body>

</html>