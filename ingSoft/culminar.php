<?php
    include_once 'consultas.php';

    if(isset($_POST['id_Arch'])){
        culminarArchivo($_POST['id_Arch']);
        //borrar el historial del archivo el cual fue culminado
        eliminarHistorialDeArchivo($_POST['id_Arch']);

?>
    <script>
        window.location='ArchivosPrincipal.php';
    </script>

<?php
    
        
    }


?>
