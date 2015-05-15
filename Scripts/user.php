<?php
require('database.php');
session_start();
$method = $_SERVER['REQUEST_METHOD'];  
switch($method)
{
case 'GET': 
    // Get User by Username
   
    if(isSet($_GET['userid'])){
        $userId = $_GET['userid'];
        if($stmt = $conn -> prepare("SELECT id, firstname, lastname, email, phoneNumber FROM users WHERE id=?")){
        /* Bind parameters s -> String, b -> Blob etc.*/
        $stmt -> bind_param("s", $userId);
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
    else{
        $query = "SELECT * FROM users";
        if($result = $conn->query($query)){
        
        $json_result = array("users" => array());
            
        while( $row = $result->fetch_row()){
        array_push($json_result["users"],array("id" => $row[0], "username" => $row[1],"firstname" => $row[2], "lastname" => $row[3], "email" => $row[5], "phoneNumber" => $row[6]));
        }
            
            echo json_encode($json_result);
        }
    }
    //ToDo: Else if user doesn't exist create a error json report
    break;
    
    case 'POST': 
    
    if($_POST["Update"]){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phonenumber'];
        $password = $_POST['password'];

        if($stmt = $conn -> prepare("UPDATE users SET firstname = ?, lastname = ?, password = ?, email = ?, phoneNumber = ? WHERE id = ?")){
            /* Bind parameters s -> String, b -> Blob etc.*/
            $stmt -> bind_param("ssssss", $firstname, $lastname, $password, $email, $phoneNumber, $_SESSION['userId']);
            $stmt -> execute(); 

            $stmt -> fetch();
            $stmt -> close();                       
        }
        break;
    }
    else{
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];

        if($stmt = $conn -> prepare("INSERT INTO users (username, firstname, lastname, password, email, phoneNumber) VALUES (?, ?, ?, ?, ?, ?)")){
            /* Bind parameters s -> String, b -> Blob etc.*/
            $stmt -> bind_param("ssssss", $username, $firstname, $lastname, $password, $email, $phoneNumber);
            $stmt -> execute(); 

            $stmt -> fetch();
            $stmt -> close();

            echo json_encode(array("result" => "true"));

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