<?php

@session_start();
require_once("meniu.php");
require_once("../user.php");

$objUser = new user;

if(!$objUser->usersAvailable()){
    header("Location: ../home.php");
    exit();
}
else{
    $allUsers = $objUser->getAllUsers();
}

?>

<html>
    <head>
        <title> View Users</title>
    </head>
    <body >
<div id="content">
        <p>Vizualizare Useri inregistrati</p>
        <table border="1">
                        <tr>
                            <td> First Name</td>
                            <td> Last Name</td>
                            <td> UserName</td>
                            <td> Email</td>
                            <td> Join Date</td>
                            

                        </tr>
                         <?php foreach($allUsers as $user){
                        ?>
                        <tr>
                            <td> <?php echo $user['first_name']; ?> </td>
                            <td> <?php echo $user['last_name']; ?> </td>
                            <td> <?php echo $user['username']; ?> </td>
                            <td> <?php echo $user['email']; ?> </td>
                            <td> <?php echo $user['data']; ?> </td>

                        </tr>
                         <?php } ?>
                    </table>
        </div>
    </body>
</html>
