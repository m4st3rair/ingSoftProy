<?php

    if(isset($_POST['UserName']) && isset($_POST['email']) && isset($_POST['pwd'])){
        include_once 'consultas.php';
        nuevo_Usuario($_POST['UserName'], $_POST['email'], $_POST['pwd']);
?>
    <script>
        alert("Nuevo Usuario creado");
        window.location="index.php";
    </script>
<?php
    }else{
?>
    <script>
        alert("Algo salio mal.. Por favor intente de nuevo");
    </script>

<?php

    }

?>