<?php
class db_connect {
    function getConnection()
    {
        require_once("config.php");
        $link = mysqli_init();
        if (!$link) {
            die('mysqli_init failed');
        }

        if (!mysqli_real_connect($link, MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, DATABASE)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }

        return $link;

    }

    function closeConnection($link){
        mysqli_close($link);
    }

}
