<?php

session_start();
$form = '';

if(isSet($_SESSION['userId'])){ 
    
    $form = '<form action="../Scripts/administration.php" method="POST">
        <span style="display:none" id="userId" data-user-id="'.$_SESSION['userId'].'"></span>
        <div><label>First name: </label><input name="firstname" type="text"></div>
        <div><label>Last name: </label><input name="lastname" type="text"></div>
        <div><label>Password: </label><input name="password" type="password"></div>
        <div><label>Email: </label><input name="email" type="text"></div>
        <div><label>Phone number: </label><input name="phonenumber" type="text"></div>
        <button type="button" onclick="AjaxRequests.changeUserData()">Change User Data</button>
    </form>';
} 

$json_result = json_encode(array("userForm" => $form));
echo $json_result;
?>