<?php

    include('/xampp/htdocs/trabajo-dashboard/validaciones/validaciones-de-login-index/db.php');

    if (isset($_POST['registrar'])) {
        if (strlen($_POST['tip_doc']) >= 1 && strlen($_POST['num-doc']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['rol']) >= 1 && strlen($_POST['contraseña']) >= 1) {
            $MD5contraseña = md5($contraseña);

            $tip_doc = $_POST['tip_doc'];
            $num_doc = $_POST['num_doc'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $rol = $_POST['rol'];
            $contraseña = $_POST['contraseña'];

            $consulta = "INSERT INTO asistencias(documento, numero_documento, nombre, apellido, correo, telefono, rol, contraseña) VALUES ('$tip_doc','$num_doc','$nombre','$apellido','$correo','$telefono','$rol','$MD5contraseña')";
            $resultado = mysqli_query($conexion,$consulta);
            
            header("location: /../../../pagina/pagina-registro-usuario.php");
        }
    }

?>