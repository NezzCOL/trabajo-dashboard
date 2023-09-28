<?php include('../validaciones/db.php'); ?>

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
    <title>Registro Fichas</title>
    <link rel="stylesheet" href="../css/css-coordinador/style-pagina-inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/css-coordinador/fichas.css">
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
                        <a href="../index.php" class="cerrar-sesion">Cerrar Sesión</a>
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
            <button class="text-4"><i class='bx bx-book'></i></i><p>Programas</p></button>
            <button class="text-5"><i class='bx bx-clipboard' style='color:#ffffff'  ></i><p>Instructor</p></button>
            <button class="text-6"><i class='bx bx-user-plus' style='color:#ffffff'  ></i><p>Aprendiz</p></button>
        </nav>
        <div class="content-fichas">
            <div class="from-fichas">
                <h2>Registrar ficha</h2>
                <form class="contenido" action="../validaciones/validacion-ficha.php" method="post">
                    <div class="programas">
                        <label>Programas</label><br>
                        <select name="programa" class="programa">
                        <?php
                            $programas = 'Select * from programa where nombre_programa = nombre_programa';
                            $query = mysqli_query($conexion, $programas);
                            while ($ficha = mysqli_fetch_array($query)) {
                                echo "<option value='".$ficha['id']."'>"
                                    .$ficha['nombre_programa'].
                                    "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="numero-ficha">
                        <label>Número de fichas</label><br>
                        <input type="number" name="numero-ficha" require placeholder="Número de ficha">
                    </div>
                    <div class="alias-ficha">
                        <label>Alias de ficha</label><br>
                        <input type="text" name="alias-ficha" require placeholder="Alias de ficha">
                    </div>
                    <div class="estado-ficha">
                        <label>Estado ficha</label><br>
                        <select name="estado" id="estado">
                        <?php
                            $estado_ficha = 'Select * from sub_items where items_id = 3';
                            $query = mysqli_query($conexion, $estado_ficha);
                            while ($ficha = mysqli_fetch_array($query)) {
                                echo "<option value='".$ficha['id']."'>"
                                    .$ficha['descripcion_item'].
                                    "</option>";
                            }
                        ?>
                        </select>

                        <input type="submit" value="Ingresar ficha" class="enviar-ficha" name='Ingresar-ficha'>
                    </div>
                </form>
                <div class="content-tabla">
                    <h4>Registro de fichas</h4>
                    <div class="tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>programa</th>
                                    <th>Número de Ficha</th>
                                    <th>Alias</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $consult = 'SELECT f.id, p.nombre_programa AS programa, f.ficha, f.alias, s_estado.descripcion_item AS estado_ficha
                                FROM fichas f
                                JOIN programa p ON f.id_programa = p.id
                                JOIN sub_items s_estado ON f.estado_ficha=s_estado.id ';
                                $query = mysqli_query($conexion, $consult);
                                while ($mostrar = mysqli_fetch_array($query)){
                            ?>
                                        <tr>
                                            <td><?php echo $mostrar['id'] ?></td>
                                            <td><?php echo $mostrar['programa'] ?></td>
                                            <td><?php echo $mostrar['ficha'] ?></td>
                                            <td><?php echo $mostrar['alias'] ?></td>
                                            <td><?php echo $mostrar['estado_ficha'] ?></td>
                                            <td>
                                                <a class="editar"><i class='bx bxs-edit'></i></a>
                                                <form class="eliminar" action="../validaciones/eliminar-ficha.php" method="post">
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
    </aside>
</body>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>