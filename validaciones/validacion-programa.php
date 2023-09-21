<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['Ingresar-programa'])) {
        $programa = $_POST['nombre-programa'];
        $estado_programa = $_POST['estado-programa'];

        if (
            strlen($programa) >= 1 &&
            strlen($estado_programa) >= 1
        ) {
            $consulta = "INSERT INTO `programa`(`nombre_programa`, `estado_programa`) 
            VALUES ('$programa','$estado_programa')";

            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                header("Location: ../../../../trabajo-dashboard/pagina/registro-programa.php");
            } else {
                echo "Error en la inserción de datos: " . mysqli_error($conexion);
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>