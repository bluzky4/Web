<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();
require_once '..\db_contact.php';
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
<nav>
    <div>
        <div class="b">
            <p class="logo"><strong>Teste</strong>de<strong>Inteligenta</strong></p>
        </div>
        <div class="top-nav">
            <ul>
                <li class="active-item">
                    <a href="../forms/index.php">Home</a></li>
                <li><a href="../forms/login.php">LogIn</a></li>
                <li><a href="../forms/register.php">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Latest News</h3>
            <p>In curand vom adauga mai multe categorii de teste pentru a va pune cunostintele la bataie.<br />
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Useful things</h3>
            <p>Dumeneavoastra ca si utilizatori ai site-ului nostru ne puteti propune noi teste.</p> 
            <p>Daca gasiti un test cu o intrebare gresita ne puteti contacta la sectiunea <a href="contact.php"><strong> Contact Us</strong></a></p>
          </div>
        </div>
      </div>
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
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" value="submit" /></p>
          </div>
        </form>

      </div>
    </div>
    <div id="footer">   
        <p><a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="register.php">Register</a> |<a href="contact.php">Contact Us</a></p>
      <p>Copyright &copy; Condurache Ciprian-Marcel </p>
    </div>
    </body>
</html>
