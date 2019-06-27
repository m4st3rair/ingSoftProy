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
    <style type="text/css">
  body{
    background-image: url(https://wallpapercave.com/wp/wp1918888.jpg);
    font: 180% sans-serif;
  }
</style>
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

    <form action="#" method="POST">

        <div class="form-group">
            <label for="titArch">Titulo del Archivo</label>
            <input type="input" class="form-control" id="titArch" name="titArch" required>
        </div>

        <div class="form-group">
            <label for="descArch">Descripcion del Archivo</label>
            <input type="input" class="form-control" id="descArch" name="descArch" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea class="form-control" rows="7" id="contenido" name="contenido"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Aceptar</button>

    </form>
    
    <?php
        if(isset($_POST['titArch']) && isset($_POST['descArch']) ){
            include_once 'consultas.php';
            nuevo_Archivo($usrS->getidUsr(), $_POST['titArch'], $_POST['descArch'] , $_POST['contenido']);
            $archInfo=busqedaDArchivo2($usrS->getidUsr());
            nuevaHistoria($usrS->getidUsr(),$_POST['contenido'], $archInfo[1], 'ACEPTADO', $archInfo[0]);

    ?>
    <script>
        alert("Nuevo archivo agregado");
        window.location="ArchivosPrincipal.php";
    </script>
    <?php
        }
    ?>


    </body>
</html>