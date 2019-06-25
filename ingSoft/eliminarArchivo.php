<?php
    include_once 'consultas.php';
    EliminarArchivo($_POST['id_Arch']);
    ?>
<script>
    alert("Archivo Eliminado Permanentemente");
    window.location="ArchivosPrincipal.php";
</script>    
    
<?php

?>