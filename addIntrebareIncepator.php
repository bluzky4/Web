<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();

require_once(".incepator.php");
$obj=new incepator;

if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("intrebare",$userData)){
        $intrebare = $userData['intrebare'];
        $obj->addIncepator($intrebare);
    }
}
    if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("corect",$userData)){
        $corect = $userData['corect'];
        $obj->addIncepator($corect);
    }
    if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("r2",$userData)){
        $r2 = $userData['r2'];
        $obj->addIncepator($r2);
    }
    }
    if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("r3",$userData)){
        $r3 = $userData['r3'];
        $obj->addIncepator($r3);
    }
    }
    if(!empty($_POST)) {
    $userData = $_POST;
    if(array_key_exists("r4",$userData)){
        $r4 = $userData['r4'];
        $obj->addIncepator($r4);
    }
        if($obj->addIncepator)
        {
            echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
        }
        else
        {
            echo "<script>alert('FAILED TO INSERT');</script>";
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
    <div>
        <div>
            <p>CONTACT US: <strong>0722982855</strong> | <strong>ciprian.condurache95@e-uvt.ro</strong></p>
        </div>
    </div>
</div>
<nav>
    <div>
        <div class="b">
            <p class="logo"><strong>Teste</strong>de<strong>Inteligenta</strong></p>
        </div>
        <div class="top-nav">
            <ul>
                <li class="active-item">
                    <a href="../forms/main.php">Home</a></li>
                <li><a href="../forms/teste.php">Teste</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="main">
    <div class="main-row">
        <div class="login-form">
            <div class="agile-row">
                <h2>Adaugare Intrebare </h2>
                <div class="login-top" >
                    <form action="#" method="post">
                        <label for="intrebare">Intrebare</label>
                        <input type="text" class="intrebare" id="intrebare" name="intrebare"/>
                       <label for="corect">Raspunsuri </label>
                        <input type="text" class="corect" id="corect" name="corect"/>
                        <input type="text" class="r2" id="r2" name="r2"/>
                        <input type="text" class="r3" id="r3" name="r3"/>
                        <input type="text" class="r4" id="r4" name="r4"/>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
