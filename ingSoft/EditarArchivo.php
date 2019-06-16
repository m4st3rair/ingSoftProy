<!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    </head>
    <body>
    <?php
        include_once 'sesiones.php';
        $usrS = new UserSession();

    ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">GITHUBMexicoEdition</a>
            </div>
            <div class="navbar-header">
            <a class="navbar-brand" href="#"><?php echo $usrS->getnomUsr(); ?></a>
            </div>

            <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li class="active"><a href="archivosPrincipal.php">Archivos</a></li>
            <li><a href="ColaborarPrincipal.php">Colaborar</a></li>
            <li><a href="logout.php">Cerrar sesion</a></li>
            </ul>
        </div>
    </nav>



    <div class="row">
        <div class="col-sm-12">
            <h4>
                Propietario:<?php echo " ".$usrS->getnomUsr(); ?>
            </h4>        
        </div>
    </div>
    <?php
        if (isset($_POST['id_Arch'])) {
            include_once 'consultas.php';
            $arch=busqedaDArchivo($_POST['id_Arch']);
    ?>
    
        <form action="#" method="POST">
                <input type="text" name="id_archivo" id="id_archivo" value="<?php echo $_POST['id_Arch'];?>" hidden>
                <div class="form-group">
                    <label for="titArch">Titulo del Archivo</label>
                    <input type="input" class="form-control" value="<?php echo $arch[1];?>" id="titArch" name="titArch" readonly>
                </div>

            <div class="form-group">
                <label for="descArch">Descripcion del Archivo</label>
                <input type="input" class="form-control" value="<?php echo $arch[4];?>" id="descArch" name="descArch" readonly>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea class="form-control" rows="7" id="contenido" name="contenido"> <?php echo $arch[2];?> </textarea>
            </div>
            
            <button type="submit" class="btn btn-default">Guardar</button>

        </form>


    <?php    
        }
    ?>
    
    <?php
        if(isset($_POST['contenido'])){
            include_once 'consultas.php';
            $arch=busqedaDArchivo($_POST['id_archivo']);

            date_default_timezone_set('America/Mexico_City');
            $fech = date('Y-m-d H:i:s');
            

            if ($usrS->getidUsr()==$arch[5]) {
                echo "Son el mismo por lo tanto se aprueba inmediatamente el cambio";    
                nuevaHistoria($usrS->getidUsr() ,$_POST['contenido'], $fech, 'ACEPTADO', $_POST['id_archivo'] );                
                actualizar_Archivo_local($_POST['contenido'], $_POST['id_archivo']);
            }else{
                
                echo "El dueño y el Editor no son la misma persona";
            }
            
            
            
    ?>
    <script>
        alert("Cambios guardados");
        window.location="ArchivosPrincipal.php";
    </script>
    <?php
        }
    ?>


    </body>
</html>