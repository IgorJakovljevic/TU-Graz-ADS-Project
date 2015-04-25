<?php
session_start();
$form = '';
//todo : load file types from DB
if(isSet($_SESSION['userId'])){ 
    $form = '<form action="../Scripts/file.php" method="POST" enctype="multipart/form-data">
        <input id="file" name="file" type="file"> 
        <input name="description" type="text" placeholder="File description">
        <select name="fileType">
            <option value="1">Photo</option>
            <option value="2">Audio</option>
        </select>
        <button type="button" onclick="AjaxRequests.updateFile()">Upload new File</button>
    </form>';
} else {
    
    $form = '<div>You must login to add new files.</div>
    <a href="../UI/_administration.php">Login</a>';
}



$json_result = json_encode(array("userForm" => $form));
echo $json_result;

?>