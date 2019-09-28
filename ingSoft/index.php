
<?php
    include_once ("sesiones.php");
    include_once 'consultas.php';

    $usrS = new UserSession();

    if (isset($_SESSION['email'])) {
        //echo "hay session";
        include_once 'pantallaInicio.php';

    }else if (isset($_POST['pwd']) && isset($_POST['email'])) {

        $usuario = validarCuenta($_POST['pwd'], $_POST['email']);
        if (sizeof($usuario)==0){
            $malCorreo="Correo electronico y/o contraseña no valido";
            include_once 'loginRegistro.php';
        }else{
            //$malCorrreo="Listo ahora al menu papu";
            $usrS->create_Session($usuario[2], $usuario[1], $usuario[0]);
            include_once 'pantallaInicio.php';
        }
        
        //echo "Hay que validar datos";
    }else{
        //echo "No esta registrado";
        include_once 'loginRegistro.php';
    }

?>


