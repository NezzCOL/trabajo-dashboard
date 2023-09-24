<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['registrar_aprendiz'])) {
        $aprendiz = $_POST['aprendiz'];
        $num_ficha = $_POST['num-ficha'];
        $estado = $_POST['estado'];

        if (
            strlen($aprendiz) >= 1 &&
            strlen($num_ficha) >= 1 &&
            strlen($estado) >= 1
        ) {
            $consulta = "INSERT INTO `aprendiz`(`id_persona`, `id_ficha`, `estado`) 
            VALUES ('$aprendiz','$num_ficha','$estado')";

            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                header("Location: ../../../../trabajo-dashboard/pagina/registro-aprendiz.php");
            } else {
                echo "Error en la inserción de datos: " . mysqli_error($conexion);
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>