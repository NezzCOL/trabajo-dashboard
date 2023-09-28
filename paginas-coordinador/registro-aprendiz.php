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
    <link rel="stylesheet" href="../css/css-coordinador/style-pagina-inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/css-coordinador/aprendiz.css">
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
        </nav>
        <div class="content-aprendiz">
            <div class="from-aprendiz">
                <h2>Registro de Aprendiz</h2>
                <form class="aprendiz" action="../validaciones/validacion-aprendiz.php" method="post">
                    <div class="nom-aprendiz">
                        <label>Nombre del Aprendiz</label><br>
                        <select name="aprendiz">
                            <?php
                                $aprendiz = "SELECT * FROM asistencias where rol = 5";
                                $query = mysqli_query($conexion, $aprendiz);

                                while ($datos = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $datos['id'] . '" >
                                    ' . $datos['nombre'] . " " . $datos['apellido'] . ' 
                                    </option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="num-ficha">
                        <label>Número de ficha</label><br>
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
                    <div class="estado">
                        <label>Estado</label><br>
                        <select name="estado">
                            <?php
                                $estado_ficha = 'Select * from sub_items where items_id = 5';
                                $query = mysqli_query($conexion, $estado_ficha);
                                while ($ficha = mysqli_fetch_array($query)) {
                                    echo "<option value='".$ficha['id']."'>"
                                        .$ficha['descripcion_item'].
                                        "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <input class="registrar_aprendiz" type="submit" value="registrar" name="registrar_aprendiz">
                </form>
                <div class="content-tabla">
                        <h4>Usuarios Registrados</h4>
                    <div class="tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aprendiz</th>
                                    <th>Ficha</th>
                                    <th>estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT aprendiz.id, CONCAT(asistencias.nombre,' ',asistencias.apellido) AS nombreCompleto, 
                                fichas.ficha, sub_items.descripcion_item FROM aprendiz 
                                INNER JOIN asistencias ON aprendiz.id_persona = asistencias.id
                                INNER JOIN fichas ON aprendiz.id_ficha = fichas.id 
                                INNER JOIN sub_items ON aprendiz.estado_aprendiz = sub_items.id";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar['id'] ?></td>
                                        <td><?php echo $mostrar['nombreCompleto'] ?></td>
                                        <td><?php echo $mostrar['ficha'] ?></td>
                                        <td><?php echo $mostrar['descripcion_item'] ?></td>
                                        <td>
                                            <a class="editar"><i class='bx bxs-edit'></i></a>
                                            <form class="eliminar" action="../validaciones/eliminar-aprendiz.php" method="post">
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
            </div>
        </div>
    </aside>
</body>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>
