<?php include('../../validaciones/db.php'); ?>

<?php
    session_start();
    if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
        header('location: ../../../../index.php');
    }
?>

<?php
    if (isset($_POST['Actualizar_aprendiz'])) {
        $id = $_POST['id'];
        $aprendiz = $_POST['aprendiz'];
        $num_ficha = $_POST['num-ficha'];
        $estado = $_POST['estado'];

        $sql = "UPDATE aprendiz SET id_persona = '".$aprendiz."', 
        id_ficha = '".$num_ficha."', estado_aprendiz = '".$estado."' where id = '".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        header('location: ../../../../../trabajo-dashboard/paginas-coordinador/registro-aprendiz.php');
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM aprendiz where id ='".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        $mostrar = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Aprendiz</title>
    <link rel="stylesheet" href="../../css/css-coordinador/style-pagina-inicio.css">
    <link rel="stylesheet" href="../../css/css-coordinador/aprendiz.css">
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
            <div class="content-aprendiz">
            <div class="from-aprendiz">
                <h2>Registro de Aprendiz</h2>
                <form class="aprendiz" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
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
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <input class="registrar_aprendiz" type="submit" value="registrar" name="Actualizar_aprendiz">
                </form>
                    <a href="../../paginas-coordinador/registro-aprendiz.php" class="Regresar">Regresar</a>
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