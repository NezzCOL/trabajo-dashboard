<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['Ingresar-ficha'])) {
        $programas = $_POST['programa'];
        $numero_ficha = $_POST['numero-ficha'];
        $alias_ficha = $_POST['alias-ficha'];
        $estado_ficha = $_POST['estado'];

        if (
            strlen($programas) >= 1 &&
            strlen($numero_ficha) >= 1 &&
            strlen($alias_ficha) >= 1 &&
            strlen($estado_ficha) >= 1
        ) {
            $consulta = "INSERT INTO `fichas`(`id_programa`, `ficha`, `alias`, `estado_ficha`) VALUES 
            ('$programas','$numero_ficha','$alias_ficha','$estado_ficha')";

            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                header("Location: ../../../../trabajo-dashboard/pagina/registro-fichas.php");
            } else {
                echo "Error en la inserción de datos: " . mysqli_error($conexion);
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>