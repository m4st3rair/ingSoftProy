

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

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-block" data-toggle="modal" data-target="#myModal">Colaboradores</button>
  <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Colaboradores</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                        $colaboradores = consultaColaboradoresDArchivo($_POST['idArch']);
//0 idARCH
//1 estadoCOLAB
//2 correoUSR
                    ?>
                        <table class="table">
                            <tr>
                                <th>
                                    Correo de colaborador
                                </th>        
                                <th>
                                    Permisos de colaborador
                                </th>        
                            </tr>
                        
                    <?php 
                        foreach ($colaboradores as $key) { 
                    ?>
                            <tr>
                                <td>
                                    <?php echo $key[2];?>
                                </td>
                                <td>
                                    <?php echo $key[1];?>
                                </td>

                            </tr>
                    <?php
                        }
                    
                    ?>
                        
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