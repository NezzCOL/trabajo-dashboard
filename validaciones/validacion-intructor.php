<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['registrar_instructor'])) {
        $instructor = $_POST['instructor'];
        $num_ficha = $_POST['num-ficha'];

        $instructores = "SELECT * FROM instructor where id_persona = '$instructor' AND id_ficha = '$num_ficha'";
        $query = mysqli_query($conexion, $instructores);

        if (
            strlen($instructor) >= 1 &&
            strlen($num_ficha) >= 1
        ) {
            if (mysqli_num_rows($query) > 0) {
                echo 'Los datos del instructor que intenta actualizar, ya están registrados.';
            } else {
                $consulta = "INSERT INTO `instructor`(`id_persona`, `id_ficha`) 
                VALUES ('$instructor','$num_ficha')";
                $resultado = mysqli_query($conexion, $consulta);
                header("Location: ../../../../trabajo-dashboard/pagina/registro-instructor.php");
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>