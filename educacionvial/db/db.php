<?php
    $dbhost='localhost';
    $dbusername='root';
    $dbuserpass='';
    $dbname='proyectopp';
    $link = mysqli_connect("$dbhost","$dbusername","$dbuserpass");
    mysqli_select_db($link,"$dbname");
    mysqli_query($link,"SET NAMES 'utf8'");
?>