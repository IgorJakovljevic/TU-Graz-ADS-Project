<?php

$form =  '
<form id="CreateNewUser" onSubmit="document.getElementById("CreateNewUser").disabled=true;">
        <input name="username" type="text" placeholder="username">
        <input name="firstname" type="text" placeholder="firstname">
        <input name="lastname" type="text" placeholder="lastname">
        <input name="email" type="text" placeholder="email">
        <input name="phoneNumber" type="text" placeholder="phoneNumber">
        <input name="password" type="text" placeholder="password">
        
        <button type="button" onclick="AjaxRequests.createNewUser()">Create new User</button>
</form>';

$json_result = json_encode(array("userForm" => $form));
echo $json_result;

?>