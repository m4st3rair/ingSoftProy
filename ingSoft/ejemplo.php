<?php
    include_once 'conectDB.php';
    
    $conexion = conectarDB();
    
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table borde='2'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Nombre</th>";
	echo "</tr>";
	
	// Bucle while que recorre cada registro y muestra cada campo en la tabla.
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['idUSR'] . "</td><td>" . $columna['nombreUSR'] . "</td>";
		echo "</tr>";
	}
	
	echo "</table>"; // Fin de la tabla
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
?>