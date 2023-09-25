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
    <link rel="stylesheet" href="../css/style-pagina-inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/instructor.css">
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
            <button class="text-1"><i class='bx bxs-home'></i><p>INICIO</p></button>
            <button class="text-2"><i class='bx bxs-user'></i><p>Registrar Usuario</p></button>
            <button class="text-3"><i class='bx bx-add-to-queue'></i><p>Fichas</p></button>
            <button class="text-4"><i class='bx bx-book'></i><p>Programas</p></button>
            <button class="text-5"><i class='bx bx-clipboard' style='color:#ffffff'  ></i><p>Instructor</p></button>
            <button class="text-6"><i class='bx bx-user-plus' style='color:#ffffff'  ></i><p>Aprendiz</p></button>
            <button class="text-7"><i class='bx bxs-user-detail' style='color:#ffffff'  ></i><p>Asistencias</p></button>
        </nav>
        <div class="content-instructor">
            <div class="from-instructor">
                <h2>Registro de instructores</h2>
                <form class="instructor" action="../validaciones/validacion-intructor.php" method="post">
                    <div class="nom-instructor">
                        <label>Nombre del Instructor</label><br>
                        <select name="instructor">
                            <?php
                                $aprendices = "SELECT * FROM asistencias where rol = 6";
                                $query = mysqli_query($conexion, $aprendices);

                                while ($datos = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $datos['id'] . '" >
                                    ' . $datos['nombre'] . " " . $datos['apellido'] . ' 
                                    </option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="num-ficha">
                        <div class="select">
                            <label>Número de ficha</label>
                            <select name="num-ficha">
                                <?php
                                    $fichas = "SELECT * FROM `fichas`";
                                    $consulta = mysqli_query($conexion, $fichas);

                                    while ($ficha = mysqli_fetch_array($consulta)) {
                                        echo "<option value='" . $ficha['id'] . "' >" . $ficha['ficha'] . " </option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <input type="submit" value="registrar" name="registrar_instructor">
                    </div>
                </form>
                <div class="content-tabla">
                        <h4>Usuarios Registrados</h4>
                    <div class="tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Instructor</th>
                                    <th>Ficha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $sql = "SELECT instructor.id, CONCAT(asistencias.nombre,' ',asistencias.apellido) AS nombreCompleto, 
                                fichas.ficha FROM instructor INNER JOIN asistencias ON instructor.id_persona = asistencias.id
                                INNER JOIN fichas ON instructor.id_ficha = fichas.id";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar['id'] ?></td>
                                        <td><?php echo $mostrar['nombreCompleto'] ?></td>
                                        <td><?php echo $mostrar['ficha'] ?></td>
                                        <td>
                                            <a class="editar"><i class='bx bxs-edit'></i></a>
                                            <form class="eliminar" action="../validaciones/eliminar-instructor.php" method="post">
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
                    <?php
                    include('../../trabajo-dashboard/validaciones/validaciones-registro-usuarios.php')
                    ?>
                </div>
            </div>
        </div>
    </aside>
</body>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>
