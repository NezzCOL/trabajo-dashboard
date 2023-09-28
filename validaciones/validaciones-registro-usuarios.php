<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if (isset($_POST['registrar'])) {
        $tip_doc = $_POST['tip_doc'];
        $num_doc = $_POST['num-doc'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];
        $contraseña = $_POST['contraseña'];
        $MD5contraseña = md5($contraseña);
        
        $registros = "SELECT * FROM asistencias where numero_documento = '$num_doc' OR correo = '$correo' OR telefono = '$telefono'";
        $query = mysqli_query($conexion, $registros);

        if (
            strlen($tip_doc) >= 1 &&
            strlen($num_doc) >= 1 &&
            strlen($nombre) >= 1 &&
            strlen($apellido) >= 1 &&
            strlen($correo) >= 1 &&
            strlen($telefono) >= 1 &&
            strlen($rol) >= 1 &&
            strlen($contraseña) >= 1
        ) {
            if (mysqli_num_rows($query) > 0) {
                echo 'Los datos del usuario que intenta actualizar, ya están registrados.';
            } else {
                $consulta = "INSERT INTO asistencias(documento, numero_documento, nombre, apellido, correo, telefono, rol, contraseña) 
                VALUES ('$tip_doc','$num_doc','$nombre','$apellido','$correo','$telefono','$rol','$MD5contraseña')";
                $resultado = mysqli_query($conexion, $consulta);
                header("location: ../../../../trabajo-dashboard/paginas-coordinador/pagina-registro-usuario.php");
            } 
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>