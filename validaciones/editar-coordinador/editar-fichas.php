<?php include('../../validaciones/db.php'); ?>

<?php
    session_start();
    if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
        header('location: ../../../../index.php');
    }
?>

<?php
    if (isset($_POST['Actualizar-ficha'])) {
        $id = $_POST['id'];
        $programa = $_POST['programa'];
        $numero_ficha = $_POST['numero-ficha'];
        $alias_ficha = $_POST['alias-ficha'];
        $estado = $_POST['estado'];

        $sql = "UPDATE fichas SET id_programa = '".$programa."', ficha = '".$numero_ficha."', 
        alias = '".$alias_ficha."', estado_ficha = '".$estado."' where id = '".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        header('location: ../../../../../trabajo-dashboard/paginas-coordinador/registro-fichas.php');
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM fichas where id ='".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        $mostrar = mysqli_fetch_assoc($resultado);
        $fichas = $mostrar['ficha'];
        $alias = $mostrar['alias'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Fichas</title>
    <link rel="stylesheet" href="../../css/css-coordinador/style-pagina-inicio.css">
    <link rel="stylesheet" href="../../css/css-coordinador/fichas.css">
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
            <div class="content-fichas">
            <div class="from-fichas">
                <h2>Editar ficha</h2>
                <form class="contenido" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
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
                        <input type="number" name="numero-ficha" require placeholder="Número de ficha" value="<?php echo $fichas; ?>">
                    </div>
                    <div class="alias-ficha">
                        <label>Alias de ficha</label><br>
                        <input type="text" name="alias-ficha" require placeholder="Alias de ficha" value="<?php echo $alias; ?>">
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

                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <input type="submit" value="Ingresar ficha" class="enviar-ficha" name='Actualizar-ficha'>
                    </div>
                </form>
                <a href="../../paginas-coordinador/registro-fichas.php" class="Regresar">Regresar</a>
                        <?php
    }
                        ?>
            </div>
        </aside>
    </main>
</body>
<script src="../../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>