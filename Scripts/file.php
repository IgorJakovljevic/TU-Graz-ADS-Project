<?php
require('database.php');
session_start();
$method = $_SERVER['REQUEST_METHOD'];  
switch($method)
{
case 'GET': 
    //Get Audio files from db
    $query = "SELECT * FROM file";
    if ($result = $conn->query($query)) {
        
    $json_result = array( "files" => array());
        
    while ($row = $result->fetch_row()) {
        array_push($json_result["files"],array( "id" => $row[0], "location" => $row[1],"description" => $row[2],"fileType" => $row[3]));
    }
        
    echo json_encode($json_result);
        
    $result->close();
    }
    break;
    
case 'POST': 
    // Save Audio file to db
    $description = $_POST['description'];
    $fileType = $_POST['fileType'];
    $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $serverLocation = "Files/";
    $serverLocation = $serverLocation .  $_SESSION['userId'] . date("Y-m-d-H-i-s") . "." . $fileExtension;
    
    if(move_uploaded_file($_FILES['file']['tmp_name'],"../" . $serverLocation))
    {
    //Tells you if its all ok
    echo "The file has been uploaded, and your information has been added to the directory";
    }
    else {
    //Gives and error if its not
    echo "Sorry, there was a problem uploading your file.";
    }
    
    
    if($stmt = $conn->prepare("INSERT INTO file (filelocation, description, type, Users_id) VALUES(?, ?, ?, ?)") ){
        $stmt->bind_param("ssii", $serverLocation, $description, $fileType, $_SESSION['userId']);
        $stmt->execute();
        $stmt->close();
    }
    
    break;
    
case 'DELETE':
    $id = $_REQUEST['id'];
    
    if($stmt = $conn->prepare("DELETE FROM file WHERE id = ?") ){
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    break;
    
default:
    $returnVal = json_encode(array('error' => "Page has not been found."));
    echo $returnVal;
    break;
}
$conn -> close();
?>