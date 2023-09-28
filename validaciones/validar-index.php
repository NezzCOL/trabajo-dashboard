<?php
    $conexion = mysqli_connect("localhost", "root", "", "login");
    session_start();

    if (!empty($_POST["btn"])){
        if (!empty($_POST['documento']) and !empty($_POST['contraseña'])) {
            $documento = $_POST['documento'];
            $contraseña = md5($_POST['contraseña']);
            $sql = "SELECT * FROM asistencias WHERE numero_documento = '$documento' AND contraseña = '$contraseña'";
            $result = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($result) > 0) {
                $roles = mysqli_fetch_array($result);

                if ($roles['rol'] == 4) {
                    $_SESSION['nombre'] = $roles['nombre'];
                    $_SESSION['apellido'] = $roles['apellido'];
                    header("location: ../../../../trabajo-dashboard/paginas-coordinador/pagina-inicio.php");
                } else if ($roles['rol'] == 6) {
                    $_SESSION['nombre'] = $roles['nombre'];
                    $_SESSION['apellido'] = $roles['apellido'];
                    header('location: ../../../../trabajo-dashboard/instructor/Aprendices.php');
                } else {
                    echo "<div class='error'> El usuario no existe </div>";
                }
            }
        } else {
            echo "<div class='error'> Los campos estan vacios </div>";
        }
    }
?>