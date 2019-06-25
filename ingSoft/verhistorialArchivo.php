

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
    include_once 'consultas.php';
    echo $_POST['id_Arch'];
    $historial = consultaHistorialArchivo($_POST['id_Arch']);

//0 txtModifHIST
//1 fechaHIST
//2 tituloARCH
//3 correoUSR

?>

<table class="table">
    <tr>
        <th>
            Fecha de modificación
        </th>
        <th>
            Colaborador
        </th>
        <th>
            Texto Modificado
        </th>
    </tr>
    <?php
        foreach ($historial as $key ) {
    ?>
        <tr>
            <td>
                <?php 
                    $date = date_create($key[1]);
                echo date_format($date, 'Y-m-d H:i:s');?>
            </td>
        
            <td>
                <?php echo $key[3];?>
            </td>
        
            <td>
                <?php echo $key[0];?>
            </td>
        
        </tr>
    
    <?php        
        }
    ?>
</table>




</body>
</html>


