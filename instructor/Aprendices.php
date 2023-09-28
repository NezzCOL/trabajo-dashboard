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
    <link rel="stylesheet" href="../css/css-instructor/aprendices.css">
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

        <div class="content-tabla">
            <h2>Aprendices de la ficha</h2>
            <div class="tabla">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del aprendiz</th>
                            <th>Ficha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT aprendices_instructor.id, aprendiz.id_persona, aprendiz.id_ficha FROM aprendices_instructor 
                        INNER JOIN aprendiz ON aprendices_instructor.id_persona = aprendiz.id 
                        AND aprendices_instructor.id_ficha = aprendiz.id";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_assoc($result)) {
                    ?>
                                <tr>
                                    <td><?php echo $mostrar['id'] ?></td>
                                    <td><?php echo $mostrar['id_persona'] ?></td>
                                    <td><?php echo $mostrar['id_ficha'] ?></td>
                                    <td>
                                        <a class="editar"><i class='bx bxs-edit'></i></a>
                                        <form class="eliminar" action="../validaciones/eliminar-programa.php" method="post">
                                            <input type="hidden" name="eliminar" value="<?php echo $mostrar['id'] ?>"></input>
                                            <button type="submit" class="borrar"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </aside>
</body>
<script src="../../trabajo-dashboard/js/links-instructores.js"></script>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>
