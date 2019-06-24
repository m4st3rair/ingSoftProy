<?php
include_once 'consultas.php';

if (isset($_POST['idHist']) && isset($_POST['estadoHist'])) {

    actualizar_Historial($_POST['estadoHist'], $_POST['idHist']);
    
    if ($_POST['estadoHist']=="ACEPTADO") {
        //textoMofi
        actualizar_Archivo_local($_POST['textoMofi'], $_POST['idArch']);

    }
?>
<script>
    window.location="index.php";
</script>
<?php
}

?>