<?php
    include('../validaciones/db.php');
    if(isset($_POST['eliminar'])) {
        $usuario = (int)$_POST['eliminar'];

        $usuario = mysqli_real_escape_string($conexion,$usuario);
        $eliminar = "DELETE FROM asistencias where id = $usuario";

        if (mysqli_query($conexion,$eliminar)) {
            header('location: ../pagina/pagina-registro-usuario.php');
        } else {
            echo 'error al eliminar usuario' . mysqli_error($conexion);
        }
    }
?>