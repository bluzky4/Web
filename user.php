<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start;
require_once 'db_connect.php';
class user extends db_connect{

    function addUser($first_name,$last_name,$username,$password,$email){
        $password = md5($password);
        $query = "INSERT INTO `user` (first_name,last_name,username,password,email) VALUES ('$first_name','$last_name','$username','$password','$email')";

        $mysqlConnection = $this->getConnection();
        $userAdded = mysqli_query($mysqlConnection, $query);
        $this->closeConnection($mysqlConnection);

        return $userAdded;
    }

    function getAllUsers(){
        $query = "SELECT * FROM `user`";

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

    function usersAvailable(){
        return count($this->getAllUsers()) > 0 ? true : false;
    }

    function getUser($username){
        $query = "SELECT * FROM `user` where `username` = '$username'";
        $mysqlConnection = $this->getConnection();
        $result = mysqli_query($mysqlConnection, $query);

        $this->closeConnection($mysqlConnection);

        if($result){
            $result = mysqli_fetch_assoc($result);
        }
        else{
            $result = array();
        }
        return $result;
    }

}
   