<?php
    function validarCuenta($pwd, $email){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM usuarios WHERE passUSR = '$pwd' AND correoUSR = '$email' ";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            array_push($res, $columna['idUSR'], $columna['nombreUSR'], $columna['correoUSR'], $columna['passUSR'], 'local');
        }
        mysqli_close( $conexion );
        return $res;
    
    }
    
    function consultaArchivosLoc($idPropietario){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM archivo WHERE id_propietario = '$idPropietario' AND 	tipoARCH='LOCAL' ORDER BY fechaInicioARCH DESC ";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idARCH'], $columna['tituloARCH'], $columna['descARCH'] );
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res;
    
    }
    
    function busqedaDArchivo($idArch){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM archivo WHERE idARCH = '$idArch'";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
        array_push($aux, $columna['idARCH'], $columna['tituloARCH'], $columna['textoARCH'], $columna['fechaInicioARCH'], $columna['descARCH']);
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res[0];
    
    }
    
    function nuevo_Archivo($idPorpietario, $nombreArch, $descArchivo, $contenido){
        date_default_timezone_set('America/Mexico_City');
        $fech = date('Y-m-d H:i:s');
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "INSERT INTO archivo (id_propietario, tituloARCH, descARCH, tipoARCH, fechaInicioARCH, textoARCH) VALUES ('$idPorpietario', '$nombreArch', '$descArchivo', 'LOCAL', '$fech', '$contenido')";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }

    function actualizar_Archivo_local($contenido, $idArch){
        date_default_timezone_set('America/Mexico_City');
        $fech = date('Y-m-d H:i:s');
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "UPDATE archivo SET textoARCH='$contenido' WHERE idARCH='$idArch' ";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }


?>