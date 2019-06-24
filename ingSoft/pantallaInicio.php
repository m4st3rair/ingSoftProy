

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
              <form action="respuestaSolicitudes.php" method="POST">
                <input hidden type="text" value="<?php echo $key[0];?>" name="id_Colaboracion" id="id_Colaboracion">
                <input hidden type="text" value="RECHAZADO" name="valor" id="valor">                
                <button type="submit" class="btn btn-secondary">Rechazar</button>
              </form>
              <form action="respuestaSolicitudes.php" method="POST">
                <input hidden type="text" value="<?php echo $key[0];?>" name="id_Colaboracion" id="id_Colaboracion">
                <input hidden type="text" value="SOLO LECTURA" name="valor" id="valor">
                
                <button type="submit" class="btn btn-secondary">Aceptar(Solo Lectura)</button>
              </form>

              <form action="respuestaSolicitudes.php" method="POST">
                <input hidden type="text" value="<?php echo $key[0];?>" name="id_Colaboracion" id="id_Colaboracion">
                <input hidden type="text" value="EDITOR" name="valor" id="valor">
                
                <button type="submit" class="btn btn-secondary">Aceptar(Editor)</button>
              </form>

            </div>
            
            </td>          
          </tr>
<?php
  }

?>


        </table>
      </div>
    </div>
<div class="row">
  <div class="col-sm-6">
  <h4>Modificacion a Archivos de parte de colaboradores</h4>
<?php
//0 idHIST
//1 idARCH
//2 tituloARCH
//3 descARCH
//4 correoUSR
//5 txtModifHIST
  $notificaciones = getNotificacionesCambiosaArchivos($usrS->getidUsr());


?>  
  <table class="table">
    <tr>
      <th>
        Titulo del archivo
      </th>
      <th>
        Descripcion del archivo
      </th>
      <th>
        Colaborador
      </th>
      <th>
        cambios
      </th>
    </tr>
    <?php
      foreach ($notificaciones as $key ) {
    ?>
    
    <tr>
      <td>
        <?php echo $key[2];?>
      </td>
      <td>
        <?php echo $key[3];?>
      </td>
      <td>
        <?php echo $key[4];?>
      </td>
      <td>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn" data-toggle="modal" data-target="#myModal<?php echo $key[0];?>">
    Ver Cambio
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal<?php echo $key[0];?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?php echo $key[2];?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php echo $key[5];?>
        
          <table class="table">
            <tr>
              <td>
                <form action="actualizarHist.php" method="POST">
                  <input hidden type="text" name="idHist" value="<?php echo $key[0];?>" id="idHist">
                  <input hidden type="text" name="textoMofi" value="<?php echo $key[5];?>" id="textoMofi">
                  <input hidden type="text" name="idArch" value="<?php echo $key[1];?>" id="idArch">
                  <input hidden type="text" name="estadoHist" value="ACEPTADO" id="estadoHist">
                  <button type="submit" class="btn">Aprovar</button>
                </form>
              </td>
              <td>
                <form action="actualizarHist.php" method="POST">
                  <input hidden type="text" name="idHist" value="<?php echo $key[0];?>" id="idHist">
                  <input hidden type="text" name="textoMofi" value="<?php echo $key[5];?>" id="textoMofi">
                  <input hidden type="text" name="estadoHist" value="REACHAZADO" id="estadoHist">
                  <button type="submit" class="btn">Rechazar</button>
                </form>
              </td>
            </tr>
          </table>
        
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
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


