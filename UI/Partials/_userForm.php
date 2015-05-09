<?php

session_start();
$form = '';

if(isSet($_SESSION['userId'])){ 
    
    $form = '<form action="../Scripts/administration.php" method="POST">
        <span style="display:none" id="userId" data-user-id="'.$_SESSION['userId'].'"></span>
        <input name="firstname" type="text">
        <input name="lastname" type="text">
        <input name="password" type="password">
        <input name="email" type="text">
        <input name="phonenumber" type="text">
        <button type="button" onclick="AjaxRequests.chaneDataUser()">Change User Data</button>
    </form>';
} 

$json_result = json_encode(array("userForm" => $form));
echo $json_result;
?>