
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
        <li class="active"><a href="archivosPrincipal.php">Archivos</a></li>
        <li><a href="ColaborarPrincipal.php">Colaborar</a></li>
        <li><a href="logout.php">Cerrar sesion</a></li>
        </ul>
    </div>
    </nav>
  <div class="row">
    <div class="col-sm-12">
        <input type="button" value="Nuevo Archivo" class="btn btn-block" onclick="abrirNuevoArch()">
    </div>
  </div>








    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Locales</h3>
                </div>
            </div>
            <table class="table">

                <?php
                    $archivosLocales = consultaArchivosLoc($usrS->getidUsr());
                    foreach ($archivosLocales as $value) {
                ?>
                
                <tr>
                    <form method="POST" action="Archivo_ver_local.php">
                    
                    <td>
                        <?php
                            echo $value[1];                                
                        ?>
                        <input type="text" value="<?php echo $value[0];?>" id="idArch" name="idArch" hidden>
                    </td>
                    <td>
                        <?php
                            echo $value[2];                                
                        ?>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-default">Ver</button>
                    </td>

                    </form>
                </tr>
                
                <?php
                    }

                ?>

            </table>
        
        </div>
    
        <div class="col-sm-4">

            <table class="table">
                <th>
                    <td colspan="2">
                        <h3>Compartidos</h3>
                    </td>
                </th>

                <tr>
                    <td>
                        <h4>Arch1</h4>
                    </td>
                    <td>
                        <input type="button" value="ver" onclick = "location='Archivo_ver.php'">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Arch2</h4>
                    </td>
                    <td>
                        <input type="button" value="ver">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Arch3</h4>
                    </td>
                    <td>
                        <input type="button" value="ver">
                    </td>
                </tr>
            </table>
        
        </div>
    
        <div class="col-sm-4">

            <table class="table">
                <th>
                    <td colspan="2">
                        <h3>Colaborando</h3>
                    </td>
                </th>

                <tr>
                    <td>
                        <h4>Arch1</h4>
                    </td>
                    <td>
                        <input type="button" value="ver" onclick = "location='Archivo_ver.php'">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Arch2</h4>
                    </td>
                    <td>
                        <input type="button" value="ver">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Arch3</h4>
                    </td>
                    <td>
                        <input type="button" value="ver">
                    </td>
                </tr>
            </table>
        
        </div>
    
    
    </div>


  <script>
    function abrirNuevoArch(){
        //alert("Ya cargo");
        window.location="CrearArchivo.php";
    }
  </script>
</body>
</html>