<?php include('../../validaciones/db.php'); ?>

<?php
    session_start();
    if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
        header('location: ../../../../index.php');
    }
?>

<?php
    if (isset($_POST['enviar'])) {
        $id = $_POST['id'];
        $documento = $_POST['tip_doc'];
        $numero_documento = $_POST['num-doc'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];
        $contraseña = $_POST['contraseña'];

        $sql = "UPDATE asistencias  SET documento = '".$documento."', numero_documento = '".$numero_documento."', 
        nombre = '".$nombre."', apellido = '".$apellido."', correo = '".$correo."', correo = '".$correo."', 
        telefono = '".$telefono."', rol = '".$rol."', contraseña = '".$contraseña."' where id = '".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        header('location: ../../../../../trabajo-dashboard/paginas-coordinador/pagina-registro-usuario.php');
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM asistencias where id ='".$id."' ";
        $resultado = mysqli_query($conexion, $sql);
        
        $mostrar = mysqli_fetch_assoc($resultado);
        $numero_documento = $mostrar['numero_documento'];
        $nombre = $mostrar['nombre'];
        $apellido = $mostrar['apellido'];
        $correo = $mostrar['correo'];
        $telefono = $mostrar['telefono'];
        $contraseña = $mostrar['contraseña'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Registro Usuario</title>
    <link rel="stylesheet" href="../../css/css-coordinador/style-pagina-inicio.css">
    <link rel="stylesheet" href="../../css/css-coordinador/registro-usuario.css">
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
            <div class="container">
                <div class="main-content">
                    <h1>Editar Registro Usuario</h1>
                    <div class="content-form">
                        <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="content-form">
                            <div class="tip_doc">
                                <label for="">Tipo de documento</label><br>
                                <select name='tip_doc' class='form-control'>
                                    <?php
                                        $consulta_tipos_documentos = 'SELECT id, descripcion_item FROM sub_items WHERE items_id = 1';
                                        $resultado_tipos_documentos = mysqli_query($conexion, $consulta_tipos_documentos);
                                        
                                        while ($documento = mysqli_fetch_array($resultado_tipos_documentos)) {
                                            echo "<option value='".$documento['id']."'>"
                                                .$documento['descripcion_item'].
                                                "</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                                <div class="num-doc">
                                    <label for="">Número de documento</label><br>
                                    <input type="number" name="num-doc" value="<?php echo $numero_documento; ?>">
                                </div>

                                <div class="nombre">
                                    <label for="">Nombre</label><br>
                                    <input type="text" name="nombre" value="<?php echo $nombre; ?>">
                                </div>

                                <div class="apellido">
                                    <label for="">Apellidos</label><br>
                                    <input type="text" name="apellido" value="<?php echo $apellido; ?>">
                                </div>

                                <div class="correo">
                                    <label for="">Correo</label><br>
                                    <input type="email" name="correo" value="<?php echo $correo; ?>">
                                </div>

                                <div class="telefono">
                                    <label for="">Telefono</label><br>
                                    <input type="number" name="telefono" value="<?php echo $telefono; ?>">
                                </div>

                                <div class="rol">
                                    <label for="">Rol</label><br>
                                    <select name='rol' class='roles'>
                                    <?php
                                        $tip_doc = 'Select * from sub_items where items_id = 2';
                                        $query = mysqli_query($conexion, $tip_doc);
                                        while ($documento = mysqli_fetch_array($query)) {
                                            echo "<option value='".$documento['id']."'>"
                                                .$documento['descripcion_item'].
                                                "</option>";
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="contraseña">
                                    <label for="">Contraseña</label><br>
                                    <input type="password" name="contraseña">
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="btn">
                                    <input type="submit" value="Actualizar" name="enviar">
                                </div>
                                <a href="../../paginas-coordinador/pagina-registro-usuario.php" class="Regresar">Regresar</a>
                            </div>
                        </form><br><br><br>
                        <?php
    }
                        ?>
                    </div>
                </div>
            </div>
        </aside>
    </main>
</body>
<script src="../../../trabajo-dashboard/js/js-menu-sidebar.js"></script>
</html>