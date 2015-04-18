<?php
require('database.php');
session_start();
$method = $_SERVER['REQUEST_METHOD'];  
switch($method)
{
case 'GET': 
    // Get User by Username
    $username = $_GET['username'];
    if($username){
        if($stmt = $conn -> prepare("SELECT id, firstname, lastname, email, phoneNumber FROM users WHERE username=?")){
        /* Bind parameters s -> String, b -> Blob etc.*/
        $stmt -> bind_param("s", $username);
        $stmt -> execute(); 
        $stmt -> bind_result($userId, $userFirstName, $userLastName, $userEmail, $userPhoneNumber); 
        $stmt -> fetch();
        if($userId){
            $json_data = array(
              'user' => array(
                'id' => $userId,
                'firstname' => $userFirstName,
                'lastname' => $userLastName,
                'email' => $userEmail,
                'phonenumber' => $userPhoneNumber
              )
            );

            echo json_encode($json_data);
        }        
        $stmt -> close();
        }
    }
    //ToDo: Else if user doesn't exist create a error json report
    break;
    
case 'POST': 
    // Create sesion
    if (isSet($_SESSION['userId'])) {
        session_destroy();
        //  ToDo : Redirect to Admin Login Page
    }
    else {
   
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    if($stmt = $conn -> prepare("SELECT id FROM users WHERE username=? AND password=?")){
        /* Bind parameters s -> String, b -> Blob etc.*/
        $stmt -> bind_param("ss", $username, $password);
        $stmt -> execute(); 
        $stmt -> bind_result($userId); 
        $stmt -> fetch();
        if($userId){
            $_SESSION['userId'] = $userId;
            $_SESSION['username'] = $username;
        }
        
        //ToDo: Redirect with error that the user doesn't exist
        
        $stmt -> close();
    }                   
    }
    break;
default:
    $returnVal = json_encode(array('error' => "Page has not been found."));
    echo $returnVal;
    break;
}
$conn->close();
?>