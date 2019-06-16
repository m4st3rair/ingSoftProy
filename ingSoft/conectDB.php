<?php
    function conectarDB(){
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "githubmx";
        
        // creación de la conexión a la base de datos con mysql_connect()
        $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
        
        // Selección del a base de datos a utilizar
        $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
        // establecer y realizar consulta. guardamos en variable.
        return $conexion;    


    }

?>