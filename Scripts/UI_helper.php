<?php

function fileTypeAsSelect(){
    require ('database.php');
    $returnString = '<select name="fileType">';

    $query = "SELECT * FROM filetype";
    if ($result = $conn->query($query)){
        while ($row = $result->fetch_row()) {
            $returnString = $returnString . '<option value="'.$row[0].'">'.$row[1].'</option>';        
        }
    }

    $returnString = $returnString . '</select>' ;

    echo $returnString;
}
?>