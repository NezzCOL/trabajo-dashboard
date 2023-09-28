<?php $conexion = mysqli_connect("localhost","root","","login"); ?>

<?php
    session_start();
    if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
        header('location: ../../../index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/css-instructor/vista.css">
    <link rel="stylesheet" href="../css/css-instructor/asistencias.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="content-navbar">
        <nav class="navbar"> 
            <button class="button-icon1" id="open-close"><i class='bx bx-menu'></i></button>
            <button class="button-icon2" id="open-ajustes"><i class='bx bxs-cog'></i></button>
            <div class="menu-opciones" id="mostrar">
                <div class="content-menu">
                    <div class="menu">
                        <h4><?= $_SESSION['nombre']." ".$_SESSION['apellido'] ?></h4>
                        <hr>
                        <a href="cambiar-contraseña.php" class="camb-contraseña">Cambiar Contraseña</a>
                        <hr>
                        <a href="../validaciones/cerrar-sesion.php" class="cerrar-sesion">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <aside class="content-sidebar">
        <nav class="sidebar" id="aside">
            <button class="pagina-inst-1"><i class='bx bxs-user'></i><p>Aprendices</p></button>
            <button class="pagina-inst-2"><i class='bx bxs-user-detail' style='color:#ffffff'  ></i><p>Asistencias</p></button>
        </nav>
        <div class="content-asistencias">
            <div class="from-asistencias">
                <h2>Registrar Asistencias</h2>
                <form class="contenido-form" action="../validaciones/validacion-programa.php" method="post">
                    <div class="nom-aprendiz">
                        <label>Nombre del programa</label><br>
                        <select name="">
                        <?php
                            $aprendices = "SELECT * FROM aprendiz where id_persona = id_persona";
                            $query = mysqli_query($conexion, $aprendices);

                            while ($datos = mysqli_fetch_array($query)) {
                                echo '<option value="' . $datos['id'] . '" >
                                ' . $datos['id_persona'] . ' 
                                </option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="estado-programa">
                        <label>Estado programa</label><br>
                        <select name="estado-programa">
                        </select>
                    </div>
                    <input type="submit" value="Registrar programa" class="enviar-programa" name='Ingresar-programa'>
                </form>
            </div>
        </div>
    </aside>
</body>
<script src="../../trabajo-dashboard/js/links-instructores.js"></script>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>
