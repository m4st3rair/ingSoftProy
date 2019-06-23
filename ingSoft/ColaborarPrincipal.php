

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
  include_once 'consultas.php';
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
        <li><a href="archivosPrincipal.php">Archivos</a></li>
        <li class="active"><a href="ColaborarPrincipal.php">Colaborar</a></li>
        <li><a href="logout.php">Cerrar sesion</a></li>
        </ul>
    </div>
    </nav>

    <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Compartidos</h3>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>
                        Nombre del archivo
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Propietario
                    </th>
                    <th>
                        Colaborar
                    </th>    
                </tr>

                <?php
                    $archivosCompartidos = consultaArchivosCompAgenos($usrS->getidUsr());
                    foreach ($archivosCompartidos as $value) {
//0 idARCH
//1 tituloARCH
//2 descARCH
//3 nombreUSR
//4 correoUSR
                ?>
                
                <tr>
                    <form method="POST" action="solicitudDeColaboracion.php">
                    
                        <td>
                            <?php
                                echo $value[1];                                
                            ?>
                            <input hidden type="text" value="<?php echo $value[0];?>" id="idArch" name="idArch" >
                            <input hidden type="text" value="<?php echo $usrS->getidUsr()?>" id="solicitante" name="solicitante">
                        </td>
                        <td>
                            <?php
                                echo $value[2];                                
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $value[4];                                
                            ?>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default">Colaborar</button>
                        </td>

                    </form>
                </tr>
                
                <?php
                    }

                ?>

            </table>
        
        </div>
    </div>

  
</body>
</html>