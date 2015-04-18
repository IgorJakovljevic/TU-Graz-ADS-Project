<?php
require('database.php');
session_start();
$method = $_SERVER['REQUEST_METHOD'];  
switch($method)
{
case 'GET': 
    //Get FileTypes from db
    $query = "SELECT * FROM filetype";
    if ($result = $conn->query($query)) {
        
    $json_result = array( "types" => array());
        
    while ($row = $result->fetch_row()) {
        array_push($json_result["types"],array( "id" => $row[0], "name" => $row[1]));
    }
        
    echo json_encode($json_result);
        
    $result->close();
    }
    break;
case 'POST': 
    // Save FileType to db
    $fileTypeName = $_POST['name'];
    
    if($stmt = $conn->prepare("INSERT INTO filetype (name) VALUES(?)") ){
        $stmt->bind_param("s",$fileTypeName);
        $stmt->execute();
        $stmt->close();
    }
    break;

default:
    $returnVal = json_encode(array('error' => "Page has not been found."));
    echo $returnVal;
    break;
}

$conn->close();
?>