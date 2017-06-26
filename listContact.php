<?php

@session_start();
require_once("meniu.php");
require_once("../db_contact.php");

$objContact = new db_contact;
$allContact=$objContact->getContact();
$contact=$allContact;
?>

<html>
    <head>
        <title> View Contact</title>
    </head>
    <body >
<div id="content">
        <p>Vizualizare Plangeri</p>
        <table border="1">
            <tr>
                <td> Nume</td>
                <td> Email</td>
                <td> Mesaj</td>
            </tr>
            <?php if($contact){?>
                        <tr>
                            <td> <?php echo $contact['name']; ?> </td>
                            <td> <?php echo $contact['email']; ?> </td>
                            <td> <?php echo $contact['mesaj']; ?> </td>

                        </tr>
                         <?php } ?>
                    </table>
        </div>
    </body>
</html>
