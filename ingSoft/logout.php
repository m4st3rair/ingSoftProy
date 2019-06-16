<?php
    include_once 'sesiones.php';
    $usrS = new UserSession();
    $usrS->closeSession();
    header("location: index.php");

?>