<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();
require_once '..\db_contact.php';
require_once 'meniu.php';
$objContact= new db_contact();
if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("name",$userData)){
        $name = $userData['name'];
    }
    else{
        die("Wrong ");
        
    }

    if(array_key_exists("email",$userData)){
        $email = $userData['email'];
    }
    else{
        die("Wrong ");
        
    }
    if(array_key_exists("mesaj",$userData)){
        $mesaj = $userData['mesaj'];
    }
    else{
        die("Wrong ");
        
    }
    $Contact =$objContact->addContact($name,$email,$mesaj);


    if($Contact)
    {
        echo "<script>alert('Mesajul dumneavoastra a fost trimis.');</script>";
    }
    else
    {
        echo "<script>alert('Mesajul dumneavoastra nu a fost trimis');</script>";
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

</head>
<body>
  <div id="content">
        <h1>Contact Us</h1>
        <p>Mai jos puteti sa completati acest formular daca aveti vreo nelamurire sau daca ati intampinat vreo problema</p>
        <form action="#" method="post">
          <div class="form_settings">
            <label for="username">First Name </label>
                <input type="text" id="name" class="name" name="name" required="" placeholder="First Name"/>
            <label for="email">Email </label>
                <input type="text" id="email" class="email" name="email" required="" placeholder="Example abcd@yahoo.com"/>
            <label for="mesaj">Mesaj</label>
                <textarea class="mesaj" rows="8" cols="50" name="mesaj"></textarea>
            <p style="padding-top: 15px"><span></span><input class="submit" type="submit" value="submit" /></p>
          </div>
        </form>

      </div>
    </body>
</html>
