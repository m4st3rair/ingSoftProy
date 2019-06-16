

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
  //$usrS = new UserSession();

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
        <li class="active"><a href="index.php">Inicio</a></li>
        <li><a href="archivosPrincipal.php">Archivos</a></li>
        <li><a href="ColaborarPrincipal.php">Colaborar</a></li>
        <li><a href="logout.php">Cerrar sesion</a></li>
        </ul>
    </div>
    </nav>
  
</body>
</html>


