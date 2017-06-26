<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@session_start;
require_once("..\db_connect.php");

class avansat extends db_connect{

    function addAvansat($intrebare,$corect,$r2,$r3,$r4){
        $query = "INSERT INTO `avansat` (intrebare,corect,r2,r3,r4) VALUES ('$intrebare','$corect','$r2','$r3','$r4')";

        $mysqlConnection = $this->getConnection();
        $avansatAdded = mysqli_query($mysqlConnection, $query);
        $this->closeConnection($mysqlConnection);

        return $avansatAdded;
    }

    function getAllAvansat(){
        $query = "SELECT * FROM `avansat`";

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