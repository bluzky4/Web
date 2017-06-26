<!DOCTYPE html>
<html>
<head>
    <title>Teste pentru inteligenta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/leftmenu.css">
 

</head>
<body>
<div id="topbar">
    <div>
        <div>
            <p> <?php
    @session_start();
    
    require_once("..\user.php");
    require_once("..\admin.php");
    
    $objAdmin= new admin();
    $objUser = new user;
    
    ?>
        <?php
    if(array_key_exists("user",$_SESSION )){
        ?>
        Esti logat ca si  <?php echo $_SESSION["user"];
                if ($objAdmin->isAdmin($_SESSION['user']))
                {
                    
                }
                else 
                    if ($objUser->usersAvailable($_SESSION['user']))
                    {


                    }
  
       ?>
        <?php
   }
       ?></p>
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
                <li>
                    <a href="../forms/home.php">Home</a></li>
                <li><a href="../forms/contact1.php">Contact US</a>
                </li><li><a href="../forms/teste.php">Teste</a></li>
                <li><a href="../forms/logout.php">Log Out</a></li>


            </ul>
        </div>
    </div>
</nav>
    <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Panou Control</h3>
            <?php
    if(array_key_exists("user",$_SESSION )){
                if ($objAdmin->isAdmin($_SESSION['user']))
                {
                    echo "<a href='addAdmin.php'>Add Admin</a><br>";
                    echo "<a href='deleteAdmin.php'>Delete Admin</a><br>";
                    echo "<a href='listUsers.php'>Vizualizare Useri</a><br>";
                    echo "<a href='view.php'>Vizualizare Propuneri Teste</a><br>";
                    echo "<a href='listContact.php'>Vizualizare Plangeri</a><br>";
                    echo "<a href='logout.php'>Log Out</a><br>";
                    
                }
                else 
                    if ($objUser->usersAvailable($_SESSION['user']))
                    {
                        echo "<a href='upload.php'> Propunere Teste </a><br>";
                        echo "<a href='logout.php'>Log Out</a><br>";

                    }
  
       ?>
        <?php
   }
   ?>
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
    <div id="footer">   
        <p><a href="index.php">Home</a> | <a href="contact1.php">Contact Us</a> | <a href="logout.php">Logout</a></p>
      <p>Copyright &copy; Condurache Ciprian-Marcel </p>
    </div>
    
</body>
</html>