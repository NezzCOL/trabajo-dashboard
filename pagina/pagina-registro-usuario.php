<?php $conexion = mysqli_connect("localhost","root","","login"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="../css/style-pagina-inicio.css">
    <link rel="stylesheet" href="../css/registro-usuario.css">
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
                        <a href="cambiar-contraseña.php" class="camb-contraseña">Cambiar Contraseña</a>
                        <hr>
                        <a href="../index.php" class="cerrar-sesion">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <aside class="content-sidebar">
            <nav class="sidebar" id="aside">
                <button class="text-1"><i class='bx bxs-home'></i><p>INICIO</p></button>
                <button class="text-2"><i class='bx bxs-user'></i><p>Registrar Usuario</p></button>
            </nav>
            <div class="container">
                <div class="main-content">
                    <h1>Registro de Usuario</h1>

                    <div class="content-form">
                        <form action="../validaciones/validaciones-registro-usuarios.php" method="post">
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
                                    <input type="number" name="num-doc" required>
                                </div>

                                <div class="nombre">
                                    <label for="">Nombre</label><br>
                                    <input type="text" name="nombre" required>
                                </div>

                                <div class="apellido">
                                    <label for="">Apellidos</label><br>
                                    <input type="text" name="apellido" required>
                                </div>

                                <div class="correo">
                                    <label for="">Correo</label><br>
                                    <input type="email" name="correo" required>
                                </div>

                                <div class="telefono">
                                    <label for="">Telefono</label><br>
                                    <input type="number" name="telefono" required>
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
                                    <input type="password" name="contraseña" required>
                                </div>
                                
                                <div class="btn">
                                    <input type="submit" value="Ingresar registro" name="registrar">
                                </div>
                            </div>
                        </form><br><br><br>

                        <div class="content-tabla">
                                <h4>Usuarios Registrados</h4>
                            <div class="tabla">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tipo de documento</th>
                                            <th>Número de documento</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>correo</th>
                                            <th>Teléfono</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $sql = "SELECT * FROM asistencias";
                                        $result = mysqli_query($conexion, $sql);
                                        $contador = 1;
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td scope="row"><?php echo $contador?></td>
                                                    <?php
                                                        $typeQuery = "SELECT * FROM sub_items WHERE items_id = 1 AND id = ".$mostrar['documento'];
                                                        $typeResult = mysqli_query($conexion, $typeQuery);
                                                        $typeRol = mysqli_fetch_assoc($typeResult);
                                                    ?>
                                                    <td><?php echo $typeRol['descripcion_item'] ?></td>
                                                    <td><?php echo $mostrar['numero_documento'] ?></td>
                                                    <td><?php echo $mostrar['nombre'] ?></td>
                                                    <td><?php echo $mostrar['apellido'] ?></td>
                                                    <td><?php echo $mostrar['correo'] ?></td>
                                                    <td><?php echo $mostrar['telefono'] ?></td>
                                                    <?php
                                                        $rolQuery = "SELECT * FROM sub_items WHERE items_id = 2 AND id = ".$mostrar['rol'];
                                                        $rolResult = mysqli_query($conexion, $rolQuery);
                                                        $rolRow = mysqli_fetch_assoc($rolResult);
                                                    ?>
                                                    <td><?php echo $rolRow['descripcion_item'] ?></td>
                                                    <td>
                                                        <a class="editar"><i class='bx bxs-edit'></i></a>
                                                        <a class="borrar"><i class='bx bxs-trash'></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            $contador++;
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
            </div>
        </aside>
    </main>
</body>
<script src="../../trabajo-dashboard/js/js-menu-sidebar.js/sidebar.js"></script>
</html>