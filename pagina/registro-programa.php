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
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/style-pagina-inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/programas.css">
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
        <div class="content-programas">
            <div class="from-programas">
                <h2>Registrar Programas</h2>
                <form class="contenido-form" action="../validaciones/validacion-programa.php" method="post">
                    <div class="nom-programa">
                        <label>Nombre del programa</label><br>
                        <input type="text" require placeholder="Ingrese un nombre" name="nombre-programa">
                    </div>
                    <div class="estado-programa">
                        <label>Estado programa</label><br>
                        <select name="estado-programa">
                        <?php
                            $estado_programa = 'Select * from sub_items where items_id = 4';
                            $query = mysqli_query($conexion, $estado_programa);
                            while ($ficha = mysqli_fetch_array($query)) {
                                echo "<option value='".$ficha['id']."'>"
                                    .$ficha['descripcion_item'].
                                    "</option>";
                            }
                        ?>
                        </select>
                        
                        <input type="submit" value="Registrar programa" class="enviar-programa" name='Ingresar-programa'>
                    </div>
                </form>
                <div class="content-tabla">
                    <h4>Registro de Programas</h4>
                    <div class="tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>programa</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM programa";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                        <tr>
                                            <td><?php echo $mostrar['id'] ?></td>
                                            <td><?php echo $mostrar['nombre_programa'] ?></td>
                                            <?php
                                                $estado_ficha = "SELECT * FROM sub_items WHERE items_id = 4 AND id = ".$mostrar['estado_programa'];
                                                $estado_Result = mysqli_query($conexion, $estado_ficha);
                                                $estado = mysqli_fetch_assoc($estado_Result);
                                            ?>
                                            <td><?php echo $estado['descripcion_item'] ?></td>
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
            </div>
        </div>
    </aside>
</body>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>
