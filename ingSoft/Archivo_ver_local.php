

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
            <a class="navbar-brand" href="#" style="background-color: #e3f2fd;" ><?php echo $usrS->getnomUsr(); ?></a>
            </div>

            <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li class="active"><a href="archivosPrincipal.php">Archivos</a></li>
            <li><a href="ColaborarPrincipal.php">Colaborar</a></li>
            <li><a href="logout.php">Cerrar sesion</a></li>
            </ul>
        </div>
    </nav>
    <?php
        if (isset($_POST['idArch'])) {
            include_once 'consultas.php';
            $arch=busqedaDArchivo($_POST['idArch']);
    ?>  
    
    <div class="row">
        <div class="col-sm-3">
        <table class="table">
            <tr>
                <td>
                    <form action="EditarArchivo.php" method="post">
                        <input type="text" value="<?php echo $_POST['idArch'];?>" name="id_Arch" id="id_Arch" hidden>
                        <input class="btn btn-block" type="submit" value="Editar">
                    </form>        
                </td>
            </tr>
        
            <tr>
                <td>
                    <input class="btn btn-block" type="submit" value="Eliminar">
                </td>
            </tr>
        
            <tr>
                <td>
                    <input class="btn btn-block" type="submit" value="Historial">
                </td>
            </tr>
        
            <tr>
                <td>
                    <input class="btn btn-block" type="submit" value="Compartir">
                </td>
            </tr>
        
        
        </table>
        
        
        </div>
        <div class="col-sm-9" id="spaceForMultipleUso">
            <div class="row">
                <div class="col-sm-6">
                    <h3><?php echo $arch[1];?></h3>
                </div>
                <div class="col-sm-6">
                    <h4><?php echo $usrS->getnomUsr();?></h4>
                </div>
            
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                    <?php echo $arch[2];?>
                    </p>
                </div>
            </div>
        </div>
    
    </div>
    
    <?php
        }else{
    ?>
    <script>
        alert("Algo ha salido mal... Lo Sentimos :C ");
    </script>
    <?php
        }
    
    ?>


<script>


</script>


  
</body>
</html>