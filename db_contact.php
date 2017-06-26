<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start;
require_once 'db_connect.php';
class db_contact extends db_connect {
    function addContact($name,$email,$mesaj){
        $query = "INSERT INTO `contact` (name,email,mesaj) VALUES ('$name','$email','$mesaj')";

        $mysqlConnection = $this->getConnection();
        $Contact = mysqli_query($mysqlConnection, $query);
        $this->closeConnection($mysqlConnection);

        return $Contact;
    }
    function getContact(){
        $query = "SELECT * FROM `contact`";

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
