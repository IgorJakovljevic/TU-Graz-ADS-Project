<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>

</head>

<body>
    <?php if(isSet($_SESSION['userId'])){ ?>
    <form action="../Scripts/file.php" method="POST" enctype="multipart/form-data">
        <input name="file" type="file"> 
        <input name="description" type="text" placeholder="File description">
        <select name="fileType">
          <option value="1">Photo</option>
          <option value="2">Audio</option>
        </select>
        <button>Create new</button>
    </form>
    <?php } else {?>
    <div>You must login to add new files.</div>
    <a href="../UI/_administration.php">Login</a>
    <?php } ?>
</body>
</html>