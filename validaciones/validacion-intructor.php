<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['registrar_instructor'])) {
        $instructor = $_POST['instructor'];
        $num_ficha = $_POST['num-ficha'];

        if (
            strlen($instructor) >= 1 &&
            strlen($num_ficha) >= 1
        ) {
            $consulta = "INSERT INTO `instructor`(`id_persona`, `id_ficha`) 
            VALUES ('$instructor','$num_ficha')";

            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                header("Location: ../../../../trabajo-dashboard/pagina/registro-instructor.php");
            } else {
                echo "Error en la inserción de datos: " . mysqli_error($conexion);
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>