<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@session_start();
require_once("..\user.php");
$obj=new user;
if(array_key_exists("user",$_SESSION )){
    header("Location: ../meniu.php");
    exit();
}

if(!empty($_POST)){
    $userData = $_POST;

    if(array_key_exists("username",$userData)){
        $username = $userData['username'];
        $find=$obj->getUser($username);
        if($find != 0){
            die("<script>alert('Userul exista deja.');</script>");
        }
    }
    else{
        die("Wrong POST data");
    }
    if(array_key_exists("first_name",$userData)){
        $first_name = $userData['first_name'];
        if(!preg_match("/^[a-zA-Z ]*$/",$first_name)){
            die("<script>alert('Numai litere si spati sunt acceptate.');</script>");
        }
    }
    else{
        die("Wrong POST data");
    }

    if(array_key_exists("last_name",$userData)){
        $last_name = $userData['last_name'];
        if(!preg_match("/^[a-zA-Z ]*$/",$last_name)){
            die("<script>alert('Numai litere si spati sunt acceptate.');</script>");
        }
    }
    else{
        die("Wrong POST data");
    }
    if(array_key_exists("email",$userData)){
        $email = $userData['email'];
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            die("<script>alert('Email-ul nu este scris corect.');</script>");
        }
    }
    else{
        die("Wrong POST data");
    }
    if(array_key_exists("password",$userData)){
        $password = $userData['password'];       
        if(strlen($password) <= '8')   {
            die("<script>alert('Parola trebuie sa contina cel putin 8 caractere.');</script>");
        }
        elseif(!preg_match("#[0-9]+#", $password)){
            die("<script>alert('Parola trebuie sa contina 1 numar.');</script>");
        }
        elseif(!preg_match("#[a-a]+#", $password)){
            die("<script>alert('Parola trebuie sa contina cel putin o litera mare.');</script>");
        }
        elseif(!preg_match("#[A-Z]+#", $password)){
            die("<script>alert('Parola trebuie sa contina cel putin o litera mica.');</script>");
        }
        
        if(array_key_exists("password_confirm",$userData)) {
            $password_confirm = $userData['password'];
            if($password != $password_confirm) {
                die("Wrong POST data");
            }
        }
        else{
            die("Wrong POST data");
        }
    }
    else{
        die("Wrong POST data");
    }
    
    $userAdded =$obj->addUser($first_name,$last_name,$username, $password,$email);

    if($userAdded)
    {
        echo "<script>alert('Ati fost inregistrat cu succes.');</script>";
    }
    else
    {
        echo "<script>alert('Ceva a mers prost va rugam sa reincercati');</script>";
    }


}

?>
<html>
<head>
    <title>Teste pentru inteligenta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div id="topbar">

</div>
<nav>
    <div>
        <div class="b">
            <p class="logo"><strong>Teste</strong>de<strong>Inteligenta</strong></p>
        </div>
        <div class="top-nav">
            <ul>
                <li><a href="../forms/index.php">Home</a></li>
                <li><a href="../forms/login.php">LogIn</a></li>
                <li class="active-item"><a href="../forms/register.php">Register</a></li>
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
<div class="main">
    <div class="main-row">
        <div class="login-form">
            <div class="agile-row">
                <h2>Register Form</h2>
                <div class="login-top" >
                    <form  method="POST" action="#">
                        <label for="username">First Name </label>
                            <input type="text" id="first_name" class="first_name" name="first_name" required="" placeholder="First Name"/>
                            <label for="username">Last Name </label>
                            <input type="text" id="last_name" class="last_name" name="last_name" required="" placeholder="Last Name"/>
                        <label for="username">Username </label>
                            <input type="text" id="username" class="username" name="username" required="" placeholder="Example @john"/>
                        <label for="password">Password </label>
                            <input type="password" id="password" class="password" name="password" required="" placeholder="Password"/>
                        <label for="password_confirm">Confirm Password </label>
                            <input type="password" class="password_confirm" name="password_confirm" required="" placeholder="Confirm Password"/>
                        <label for="email">Email </label>
                            <input type="text" id="email" class="email" name="email" required="" placeholder="Example abcd@yahoo.com"/>
                        <input type="submit" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <div id="footer">   
        <p><a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="register.php">Register</a> |<a href="contact.php">Contact Us</a></p>
      <p>Copyright &copy; Condurache Ciprian-Marcel </p>
    </div>		 