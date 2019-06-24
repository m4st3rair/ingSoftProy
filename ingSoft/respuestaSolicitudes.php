<?php
    include_once 'consultas.php';


    if (isset($_POST['id_Colaboracion']) && isset($_POST['valor'])) {
        respuestaSolicitud($_POST['valor'], $_POST['id_Colaboracion']);
        ?>
        <script>
            window.location="index.php";
        </script>
        
        
        <?php

    }else{
        ?>
        <script>
            alert("Algo Imprevisto ha sucedido lo sentimos...");
            window.location="index.php";
        </script>
        
        
        <?php


    }
?>