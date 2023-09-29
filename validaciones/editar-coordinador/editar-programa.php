<?php include('../../validaciones/db.php'); ?>

<?php
    session_start();
    if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
        header('location: ../../../../index.php');
    }
?>

<?php
    if (isset($_POST['Actualizar-programa'])) {
        $id = $_POST['id'];
        $nombre_programa = $_POST['nombre-programa'];
        $estado_programa = $_POST['estado-programa'];

        $sql = "UPDATE programa SET nombre_programa = '".$nombre_programa."', 
        estado_programa = '".$estado_programa."' where id = '".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        header('location: ../../../../../trabajo-dashboard/paginas-coordinador/registro-programa.php');
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM programa where id ='".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        $mostrar = mysqli_fetch_assoc($resultado);
        $nombre_programa = $mostrar['nombre_programa'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Programas</title>
    <link rel="stylesheet" href="../../css/css-coordinador/style-pagina-inicio.css">
    <link rel="stylesheet" href="../../css/css-coordinador/programas.css">
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
                        <a href="../cambiar-contraseña.php" class="camb-contraseña">Cambiar Contraseña</a>
                        <hr>
                        <a href="../../index.php" class="cerrar-sesion">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <aside class="content-sidebar">
            <nav class="sidebar" id="aside">
                <button class="text-1"><i class='bx bxs-user'></i><p>Registrar Usuario</p></button>
                <button class="text-2"><i class='bx bx-add-to-queue'></i><p>Fichas</p></button>
                <button class="text-3"><i class='bx bx-book'></i></i><p>Programas</p></button>
                <button class="text-4"><i class='bx bx-clipboard' style='color:#ffffff'></i><p>Instructor</p></button>
                <button class="text-5"><i class='bx bx-user-plus' style='color:#ffffff'></i><p>Aprendiz</p></button>
            </nav>
            <div class="content-programas">
                <div class="from-programas">
                    <h2>Editar Programas</h2>
                    <form class="contenido-form" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="nom-programa">
                            <label>Nombre del programa</label><br>
                            <input type="text" require placeholder="Ingrese un nombre" name="nombre-programa" value="<?php echo $nombre_programa; ?>">
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
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            
                            <input type="submit" value="Registrar programa" class="enviar-programa" name='Actualizar-programa'>
                        </div>
                    </form>
                    <a href="../../paginas-coordinador/registro-programa.php" class="Regresar">Regresar</a>
                            <?php
    }
                            ?>
                </div>
            </div>
        </aside>
    </main>
</body>
<script src="../../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>