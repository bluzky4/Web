<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();

require_once("meniu.php");

?>
<!DOCTYPE html>
<html>

<body>
<div id="content">
    <h2>Teste</h2>
        <div>
        <br><br>
            <div><p>Buna ziua mai jos sunt cateva teste prin care dorim sa va testam cunostintele.  </p></div>
            <br><br>
            <p>Informatica</p><br>
                <div>
                <p><a href="../forms/test1.php"><strong>Testul 1</strong></a> este un test cu intrebari din limbajul de programare C.</p> 
                <p><a href="../forms/test2.php"><strong>Testul 2</strong></a> este un test cu intrebari din Grafică şi interfeţe utilizator.</p>
                </div>
        </div>
</div>
    </body>
</html>
