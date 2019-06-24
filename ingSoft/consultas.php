<?php

    function actualizar_Historial($estado, $idHist){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "UPDATE historial SET estadoHIST='$estado' WHERE idHIST='$idHist' ";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }




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
    
    function consultaHistorialPendiente($idARCH, $idUSR){

        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM historial
        WHERE id_Archivo='$idARCH' AND estadoHIST =  'PENDIENTE' AND id_COMP = '$idUSR';";

	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['	idHIST']);
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res;
    
    }
   
    function getNotificacionesCambiosaArchivos($idUSR){

        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM historial INNER JOIN archivo ON historial.id_Archivo = archivo.idARCH INNER JOIN usuarios ON historial.id_COMP = usuarios.idUSR 
        WHERE archivo.id_propietario='$idUSR' AND estadoHIST = 'PENDIENTE';";
        
// idHIST
// id_COMP
// txtModifHIST
// estadoHIST
// fechaHIST
// id_Archivo
// idARCH
// id_propietario
// fechaInicioARCH
// textoARCH
// tituloARCH
// tipoARCH
// descARCH
// idUSR
// nombreUSR
// passUSR	
// correoUSR	

	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idHIST'], $columna['idARCH'], $columna['tituloARCH'], $columna['descARCH'], $columna['correoUSR'], $columna['txtModifHIST']);
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res;
    
    }
    function consultaHistorialArchivo($idARCH){

        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * 
        FROM historial INNER JOIN usuarios on historial.id_COMP = usuarios.idUSR 
        INNER JOIN archivo on historial.id_Archivo = archivo.idARCH 
        WHERE historial.id_Archivo='$idARCH' AND historial.estadoHIST = 'ACEPTADO' ORDER BY fechaHIST DESC;";
        
// idHIST
// id_COMP
// txtModifHIST
// estadoHIST
// fechaHIST
// id_Archivo
// idARCH
// id_propietario
// fechaInicioARCH
// textoARCH
// tituloARCH
// tipoARCH
// descARCH
// idUSR
// nombreUSR
// passUSR	
// correoUSR	

	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['txtModifHIST'], $columna['fechaHIST'], $columna['tituloARCH'], $columna['correoUSR']);
            array_push($res, $aux);
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

    function consultaArchivosColaborando($IDcolacorador){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM colaboradores
        INNER JOIN  archivo on colaboradores.idARCH = archivo.idARCH
        WHERE colaboradores.idSolicitante='$IDcolacorador' AND (colaboradores.estadoCOLAB='SOLO LECTURA' OR colaboradores.estadoCOLAB='EDITOR')
        ORDER BY fechaInicioARCH DESC";
        
//0 idCOLAB
//1 idSolicitante
//2 idARCH
//3 estadoCOLAB
//4 idARCH
//5 id_propietario
//6 fechaInicioARCH
//7 textoARCH
//8 tituloARCH
//9 tipoARCH
//10 descARCH
        
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idARCH'], $columna['tituloARCH'], $columna['descARCH'], $columna['estadoCOLAB']);
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res;
    
    }

    function consultaArchivosComp($idPropietario){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM archivo WHERE id_propietario = '$idPropietario' AND 	tipoARCH = 'COMPARTIDO' ORDER BY fechaInicioARCH DESC ";
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
    function consultaColaboradoresDArchivo($idArchivo){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM `colaboradores` 
        INNER JOIN usuarios on colaboradores.idSolicitante=usuarios.idUSR
        WHERE idARCH='$idArchivo' AND NOT(colaboradores.estadoCOLAB='RECHAZADO') AND NOT(colaboradores.estadoCOLAB='ESPERA')
        ORDER BY usuarios.correoUSR";
    
// idCOLAB
// idSolicitante
// idARCH
// estadoCOLAB
// idUSR
// nombreUSR
// passUSR
// correoUSR 
    
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idARCH'], $columna['estadoCOLAB'], $columna['correoUSR'] );
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res;
    
    }

    

    function consultaArchivosCompAgenos($idPropietario){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM `archivo` INNER JOIN `usuarios` ON `id_propietario`= `idUSR` WHERE NOT (`idUSR` = '$idPropietario' ) AND `tipoARCH` = 'COMPARTIDO' ORDER BY fechaInicioARCH DESC ";
        //idARCH
        //id_propietario
        //fechaInicioARCH
        //textoARCH
        //tituloARCH
        //tipoARCH
        //descARCH
        //idUSR
        //nombreUSR
        //passUSR
        //correoUSR
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idARCH'], $columna['tituloARCH'], $columna['descARCH'], $columna['nombreUSR'], $columna['correoUSR']);
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
            array_push($aux, $columna['idARCH'], $columna['tituloARCH'], $columna['textoARCH'], $columna['fechaInicioARCH'], $columna['descARCH'], $columna['id_propietario']);
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res[0];
    
    }



    function busqedaDArchivo2($idpropietario){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM archivo WHERE id_propietario = '$idpropietario' ORDER BY fechaInicioARCH DESC LIMIT 1";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idARCH'], $columna['fechaInicioARCH']);
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

    
    
    function nuevo_Usuario($nombre, $correo, $pass){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "INSERT INTO usuarios (nombreUSR, passUSR, correoUSR) VALUES ('$nombre', '$pass', '$correo')";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }
    
    function nuevaHistoria($idColaborador,$textoNuevo, $fechaDeLaHistoria, $estado, $idArchivo){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "INSERT INTO historial (id_COMP, txtModifHIST, fechaHIST, estadoHIST, id_Archivo) VALUES ('$idColaborador', '$textoNuevo', '$fechaDeLaHistoria','$estado', '$idArchivo')";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }
    
    function compartirArchivo($idArch){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "UPDATE archivo SET tipoARCH='COMPARTIDO' WHERE idARCH='$idArch' ";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }


    function nuevaPeticionColaborador($idArch, $idColab){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "INSERT INTO colaboradores (idSolicitante, idARCH, estadoCOLAB) VALUES ('$idColab', '$idArch', 'ESPERA')";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }
    


    function ComprobarQueNoHayaPeticionesRepetidas($idArch, $idColab){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM `colaboradores` where idSolicitante='$idColab' AND idARCH = '$idArch'";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            array_push($res, $columna['estadoCOLAB']);
        }
        mysqli_close( $conexion );
        return $res;    
    }

    function checarSolicitudes($idPropietario){
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $consulta = "SELECT * FROM colaboradores INNER JOIN archivo on colaboradores.idARCH = archivo.idARCH LEFT JOIN usuarios ON colaboradores.idSolicitante = usuarios.idUSR WHERE archivo.id_propietario = '$idPropietario' AND colaboradores.estadoCOLAB='ESPERA'";
        //idCOLAB
        //idSolicitante
        //idARCH
        //estadoCOLAB
        //idARCH
        //id_propietario
        //fechaInicioARCH
        //textoARCH
        //tituloARCH
        //tipoARCH
        //descARCH
        //idUSR
        //nombreUSR
        //passUSR
        //correoUSR
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $res = array();
        while ($columna = mysqli_fetch_array( $resultado )){
            $aux= array();
            array_push($aux, $columna['idCOLAB'], $columna['tituloARCH'], $columna['descARCH'], $columna['correoUSR']);
            array_push($res, $aux);
        }
        mysqli_close( $conexion );
        return $res;    
    }
    
    function respuestaSolicitud($respuesta, $idColab){
        date_default_timezone_set('America/Mexico_City');
        $fech = date('Y-m-d H:i:s');
        include_once 'conectDB.php';
        $conexion = conectarDB();
        $sql = "UPDATE colaboradores SET estadoCOLAB='$respuesta' WHERE idCOLAB='$idColab' ";
        if ($conexion->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        mysqli_close( $conexion );
    }




?>
