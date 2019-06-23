

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

    <div class="row">
      <div class="col-sm-12">
        <h4>Solicitudes de Colaboración</h4>
        <table class="table">
          <tr>
            <th>Solicitante</th>
            <th>Nombre del Archivo</th>
            <th>Descripcion del Archivo</th>
            <th>Solicitud </th>
          </tr>
          <?php
            include_once 'consultas.php';
            $solicitudes = checarSolicitudes($usrS->getidUsr());
//0 idCOLAB
//1 tituloARCH
//2 descARCH
//3 correoUSR
            foreach ($solicitudes as $key) {
              
              ?>
  
          <tr>
            <td><?php echo $key[3];?></td>
            <td><?php echo $key[1];?></td>
            <td><?php echo $key[2];?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-secondary">Rechazar</button>
              <button type="button" class="btn btn-secondary">Aceptar(Editor)</button>
              <button type="button" class="btn btn-secondary">Aceptar(Solo Lectura)</button>
            </div>
            
            </td>          
          </tr>
<?php
  }

?>


        </table>
      </div>
    </div>
  
</body>
</html>


