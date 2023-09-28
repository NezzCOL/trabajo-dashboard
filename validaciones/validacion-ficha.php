<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");

    if(isset($_POST['Ingresar-ficha'])) {
        $programas = $_POST['programa'];
        $numero_ficha = $_POST['numero-ficha'];
        $alias_ficha = $_POST['alias-ficha'];
        $estado_ficha = $_POST['estado'];

        $fichas = "SELECT * FROM fichas where ficha = '$numero_ficha' OR alias = '$alias_ficha'";
        $query = mysqli_query($conexion, $fichas);

        if (
            strlen($programas) >= 1 &&
            strlen($numero_ficha) >= 1 &&
            strlen($alias_ficha) >= 1 &&
            strlen($estado_ficha) >= 1
        ) {
            if (mysqli_num_rows($query) > 0) {
                echo 'Los datos de la ficha que intenta actualizar, ya están registrados.';
            } else {
                $consulta = "INSERT INTO `fichas`(`id_programa`, `ficha`, `alias`, `estado_ficha`) VALUES 
                ('$programas','$numero_ficha','$alias_ficha','$estado_ficha')";
                $resultado = mysqli_query($conexion, $consulta);
                header("Location: ../../../../trabajo-dashboard/paginas-coordinador/registro-fichas.php");
            }
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
?>