<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['registrar_aprendiz'])) {
        $aprendiz = $_POST['aprendiz'];
        $num_ficha = $_POST['num-ficha'];
        $estado = $_POST['estado'];

        $aprendices = "SELECT * FROM aprendiz where id_persona = '$aprendiz'";
        $query = mysqli_query($conexion, $aprendices);

        if (
            strlen($aprendiz) >= 1 &&
            strlen($num_ficha) >= 1 &&
            strlen($estado) >= 1
        ) {
            if (mysqli_num_rows($query) > 0) {
                echo 'Los datos del usuario que intenta actualizar, ya están registrados.';
            } else {
                $consulta = "INSERT INTO `aprendiz`(`id_persona`, `id_ficha`, `estado_aprendiz`) 
                VALUES ('$aprendiz','$num_ficha','$estado')";
                $resultado = mysqli_query($conexion, $consulta);
                header("Location: ../../../../trabajo-dashboard/paginas-coordinador/registro-aprendiz.php");
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>