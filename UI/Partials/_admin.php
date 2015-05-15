<?php
session_start();
$form = '';

if(!isSet($_SESSION['userId'])){ 
    $form = '<form action="../Scripts/administration.php" method="POST">
        <div><input name="username" type="text" placeholder="Username"></div>
        <div><input name="password" type="password" placeholder="Password"></div>
        <button type="button" onclick="AjaxRequests.loginUser()">Login</button>
    </form>';
} else {
    
    $form = '<form action="../Scripts/administration.php" method="POST">
    <input type="text" name="userId" value="'. $_SESSION['userId'].'" hidden/>
    <label>
        "Hi, "'.$_SESSION['username'] .'
    </label>
    <button type="button" onclick="AjaxRequests.logoutUser()">Logout</button>
    </form>';
}



$json_result = json_encode(array("userForm" => $form));
echo $json_result;

?>