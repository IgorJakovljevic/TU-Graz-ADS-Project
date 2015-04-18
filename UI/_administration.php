<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>

</head>

<body>
    <?php if(!isSet($_SESSION['userId'])){ ?>
    <form action="../Scripts/administration.php" method="POST">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <button>Login</button>
    </form>
    <?php } else {?>
    <form action="../Scripts/administration.php" method="POST">
    <input type="text" name="userId" value="<?php echo $_SESSION['userId']?>" hidden/>
    <label>
        <?php echo "Hi, ".$_SESSION['username'] ?>
    </label>
    <button>Logout</button>
    </form>
    <?php } ?>
</body>

</html>