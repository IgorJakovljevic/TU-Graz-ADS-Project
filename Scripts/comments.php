<?php
require('database.php');
session_start();
$method = $_SERVER['REQUEST_METHOD'];  
switch($method)
{
case 'GET': 
    $fileId = $_GET['fileId'];
    $query = "SELECT * FROM comment WHERE File_id = ".$fileId ;
    if ($result = $conn->query($query)) {
        
    $json_result = array( "comments" => array());
        
    while ($row = $result->fetch_row()) {
        array_push($json_result["comments"],array( "idComment" => $row[0], "content" => $row[1], "Users_id" => $row[2], "File_id" => $row[3]));
    }
        
    echo json_encode($json_result);
        
    $result->close();
    }
    
    break;
    
case 'POST': 
    $content = $_POST['content'];
    $fileId = $_POST['fileId'];
    
    if($stmt = $conn->prepare("INSERT INTO comments (content, Users_id, File_id) VALUES(?, ?, ?)") ){
        $stmt->bind_param("ssii", $content, $_SESSION['userId'], $fileId);
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