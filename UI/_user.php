<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
<script type="text/javascript" src="Scripts/Javascript/AJAX-Requests.js"></script>
</head>

<body>

    <form action="../Scripts/user.php" method="POST">
        <input name="username" type="text" placeholder="username">
        <input name="firstname" type="text" placeholder="firstname">
        <input name="lastname" type="text" placeholder="lastname">
        <input name="email" type="text" placeholder="email">
        <input name="phoneNumber" type="text" placeholder="phoneNumber">
        <input name="password" type="text" placeholder="password">
        
        <button>Create new User</button>
    </form>  
     
</body>
</html>