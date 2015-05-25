<?php

$form =  '
<form id="CreateNewUser">
        <div><input name="username" type="text" placeholder="username"></div>
        <div><input name="firstname" type="text" placeholder="firstname"></div>
        <div><input name="lastname" type="text" placeholder="lastname"></div>
        <div><input name="email" type="text" placeholder="email"></div>
        <div><input name="phoneNumber" type="text" placeholder="phoneNumber"></div>
        <div><input name="password" type="text" placeholder="password"></div>
        
        <button type="button" onclick="AjaxRequests.createNewUser()">Create new User</button>
</form>';

$json_result = json_encode(array("userForm" => $form));
echo $json_result;

?>