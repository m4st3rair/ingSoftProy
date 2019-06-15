


<?php
    include_once ("sesiones.php");


    $usrSession = new UserSession();

    if (isset($_SESSION['email'])) {
        echo "hay session";
    }else if (isset($_POST['pwd']) && isset($_POST['email'])) {
        echo "Hay que validar datos";
    }else{
        echo "No esta registrado";
        include_once 'loginRegistro.php';

    }

?>


