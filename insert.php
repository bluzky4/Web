<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start;
require_once 'db_connect.php';
class insert extends db_connect{
   function addFisier($file,$type,$size){
    $query = "INSERT INTO `propuneri` (file,type,size) VALUES ('$file','$type','$size')";

    $mysqlConnection = $this->getConnection();
    $FisierAdded = mysqli_query($mysqlConnection, $query);
    $this->closeConnection($mysqlConnection);

    return $FisierAdded;
}
function select(){
    $query = "SELECT * FROM `propuneri`";

    $mysqlConnection = $this->getConnection();
    $result = mysqli_query($mysqlConnection, $query);
    $this->closeConnection($mysqlConnection);

    if($result){
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    else{
       return array();
    }
}
}
