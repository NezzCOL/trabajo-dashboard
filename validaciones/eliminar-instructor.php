<?php
    include('../validaciones/db.php');
    if(isset($_POST['eliminar'])) {
        $usuario = (int)$_POST['eliminar'];

        $usuario = mysqli_real_escape_string($conexion,$usuario);
        $eliminar = "DELETE FROM instructor where id = $usuario";

        if (mysqli_query($conexion,$eliminar)) {
            header('location: ../../../../trabajo-dashboard/pagina/registro-instructor.php');
        } else {
            echo 'error al eliminar usuario' . mysqli_error($conexion);
        }
    }
?>