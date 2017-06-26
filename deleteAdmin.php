<?php
@session_start();

require_once("..\admin.php");
require_once("meniu.php");

$obj = new admin;


if($obj->adminAvailable()){

}
else{
    $allAdmins = $obj->getAllAdmins();
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
                <h2> Delete Admin</h2>
                <div class="login-top" >
                    <form action="#" method="post">
                        <label for="user_id">Admin </label>
                        <select id="user_id" name="user_id" style="display:table-cell;">
                            <?php foreach($allAdmins as $admin){
                            ?>
                            <option name="<?php echo $admin['user_id'];?>" value="<?php echo $admin['user_id'];?>"><?php echo $admin['user_id'];?></option>
                            <?php
                        }                            
?>
                </select>
                        <input type="submit" name="delete" id="delete" value="Delete Admin" action="<?php $obj->deleteAdmin($admin['user_id']); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>