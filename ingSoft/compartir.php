<?php
    include_once 'consultas.php';
    compartirArchivo($_POST['id_Arch']);

?>
<script>
    alert("Archivo Compartido :)");
    window.location = "ArchivosPrincipal.php";
</script>
