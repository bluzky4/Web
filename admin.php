<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//@session_start;
require_once 'db_connect.php';
class admin extends db_connect{
 function addAdmin($userid){
    $query = "INSERT INTO `admin` (user_id) VALUES ('$userid')";

    $mysqlConnection = $this->getConnection();
    $userAdded = mysqli_query($mysqlConnection, $query);
    $this->closeConnection($mysqlConnection);

    return $userAdded;
}
function getAdmin($username){
    $query = "SELECT * FROM `admin` LEFT JOIN `user` ON `admin`.`user_id`=`user`.`id` WHERE `user`.`username` = '$username'";

    $mysqlConnection = $this->getConnection();
    $result = mysqli_query($mysqlConnection, $query);

    $this->closeConnection($mysqlConnection);

    if($result){
        $result = mysqli_fetch_all($result);
    }
    else{
        $result = array();
    }
    return $result;
}
function getAllAdmins(){
    $query = "SELECT * FROM `admin`";

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

function adminAvailable(){
    return count($this->getAllAdmins()) > 0 ? true : false;
}
function isAdmin($username){

    return count($this->getAdmin($username)) ? true : false;


}
  public function deleteAdmin($username){
        $query = "DELETE admin FROM admin "
                . "INNER JOIN admin ON admin.id = admin.admin_id "
                . "WHERE admin.name = '$username'"; 
        $mysqlconnection = $this->getConnection();
        $result = mysqli_query($mysqlconnection, $query);
        $this->closeConnection($mysqlconnection);
        
        if($result){
            echo "succes";
        }
        }

}