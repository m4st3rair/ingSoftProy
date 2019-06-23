<?php

    include_once 'sesiones.php';
    $usrS = new UserSession();
    include_once 'consultas.php';
    if(isset($_POST['idArch']) && isset($_POST['solicitante'])){
        
        $consultarPeticiones=ComprobarQueNoHayaPeticionesRepetidas($_POST['idArch'], $_POST['solicitante']);

        if(sizeof($consultarPeticiones)==0){
            //caso donde no se han hecho ningun tipo de peticion antes
            nuevaPeticionColaborador($_POST['idArch'], $_POST['solicitante']);
?>
            <script>
                alert("Peticion Enviada... :)");
            </script>

<?php
        }else{
            //caso donde ya se ha hecho una solicitud y se le informa si ya hay respuesta;
            if ($consultarPeticiones[0]=="ESPERA") {
                //caso donde es aceptado y se le informa
?>
                <script>
                    alert("Peticion en espera por la aprovacion del propietario...");
                </script>

<?php
            }else{
                if ($consultarPeticiones[0]=="NEGADO") {
                    ?>
                <script>
                    alert("El Propietario del Archivo a Decidido No colaborar contigo, Lo sentimos...");
                </script>

<?php
                
            }else{
                //Caso donde es rechazado y se le informa
                //puede tener 2 estados
                //EDITOR / SOLO LECTURA
                ?>
                <script>
                    alert("Tu peticion ya fue aceptada y deberia verse reflejado en tu apartado de: archivos");
                </script>
<?php
                }
            }
        }
?>
        <script>
            window.location="ColaborarPrincipal.php";
        </script>
<?php
    }
?>