<?php
    if (!empty($_POST["btn"])){
        if (!empty($_POST['documento']) and !empty($_POST['contraseña'])) {
            $documento = $_POST['documento'];
            $contraseña = md5($_POST['contraseña']);
            $sql=$conexion->query ("SELECT * FROM asistencias WHERE numero_documento = '$documento' AND contraseña = '$contraseña'");
            if ($sql->fetch_object()) {
                header("location: pagina/pagina-inicio.php");
            } else {
                echo "<div class='error'> El usuario no existe </div>";
            }
        } else {
            echo "<div class='error'> Los campos estan vacios </div>";
        }
    }
?>