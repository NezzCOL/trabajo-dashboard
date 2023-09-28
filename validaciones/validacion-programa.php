<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['Ingresar-programa'])) {
        $programa = $_POST['nombre-programa'];
        $estado_programa = $_POST['estado-programa'];

        $programas = "SELECT * FROM programa where nombre_programa = '$programa'";
        $query = mysqli_query($conexion, $programas);

        if (
            strlen($programa) >= 1 &&
            strlen($estado_programa) >= 1
        ) {
            if (mysqli_num_rows($query) > 0) {
                echo 'Los datos del programa que intenta actualizar, ya están registrados.';
            } else {
                $consulta = "INSERT INTO `programa`(`nombre_programa`, `estado_programa`) 
                VALUES ('$programa','$estado_programa')";
                $resultado = mysqli_query($conexion, $consulta);
                header("Location: ../../../../trabajo-dashboard/paginas-coordinador/registro-programa.php");
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>