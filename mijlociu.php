<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@session_start;
require_once("..\db_connect.php");

class mijlociu extends db_connect{

    function addIncepator($intrebare,$corect,$r2,$r3,$r4){
        $query = "INSERT INTO `mijlociu` (intrebare,corect,r2,r3,r4) VALUES ('$intrebare','$corect','$r2','$r3','$r4')";

        $mysqlConnection = $this->getConnection();
        $mijlociuAdded = mysqli_query($mysqlConnection, $query);
        $this->closeConnection($mysqlConnection);

        return $mijlociuAdded;
    }

    function getAllMijlociu(){
        $query = "SELECT * FROM `mijlociu`";

        $mysqlConnection =  $this->getConnection();
        $result = mysqli_query($mysqlConnection, $query);
        $this->closeConnection($mysqlConnection);

        if($result){
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        else{
            return array();
        }
    }
    
}