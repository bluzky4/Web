<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();

require_once("..\user.php");
require_once("..\admin.php");
require_once("meniu.php");
$obj=new user;
$onj=new admin;


if(!$obj->usersAvailable()){
    header("Location: home.php");
    exit();
}
else{
    $allUsers =$obj-> getAllUsers();
}

if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("user_id",$userData)){
        $userId = $userData['user_id'];
        $addAdmin=$onj->addAdmin($userId);
    }
   if($addAdmin)
    {
        echo "<script>alert('Adminul a fost adaugat');</script>";
    }
    else
    {
        echo "<script>alert('Ceva a mers prost va rugam sa reincercati');</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Teste pentru inteligenta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="main">
    <div class="main-row">
        <div class="login-form">
            <div class="agile-row">
                <h2>Add Admin</h2>
                <div class="login-top" >
                    <form action="#" method="post">
                        <label for="user">User </label>
                        <select id="user" name="user_id" style="display:table-cell;">
                    <?php foreach($allUsers as $user){
                     ?>
                    <option name="<?php echo $user['username'];?>" value="<?php echo $user['id'];?>"><?php echo $user['username'];?></option>
                    <?php
                            }
                    ?>
                </select>
                        <input type="submit" value="Add Admin">
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
