<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();
require_once("..\user.php");
$obj=new user;
if(!$obj->usersAvailable() || array_key_exists("user",$_SESSION )){
    header("Location: ../forms/home.php");
    exit();
}

if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("username",$userData)){
        $username = $userData['username'];
    }
    else{
        die("Wrong username");
        
    }
    if(array_key_exists("password",$userData)){
        $password = $userData['password'];
    }
    else{
        die("Wrong password");
    }

    $user = $obj->getUser($username);
    if(!empty($user)){
        if(array_key_exists("username", $user)){
            if(array_key_exists("password", $user)){
                if(md5($password) === $user['password']){
                    $_SESSION['user'] = $user["username"];
                    header("Location: ../forms/home.php");
                    exit();
                }
            }
        }
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
                <li class="active-item"><a href="../forms/login.php">LogIn</a></li>
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
<div class="main">
    <div class="main-row">
        <div class="login-form">
            <div class="agile-row">
                <h2>LogIn Form</h2>
                <div class="login-top" >
                    <form action="#" method="post">
                        <label for="username">Username </label>
                        <input type="text" class="username" id="username" name="username" required="" placeholder="Example @john"/>
                       <label for="password">Password </label>
                        <input type="password" class="password" id="password" name="password" required="" placeholder="Password"/>
                        <input type="submit" value="Login">
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
</body>
</html>
