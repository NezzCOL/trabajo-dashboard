<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/fondo-index.css">
</head>
<body>
    <div class="content-login">
        <h2>Iniciar Sesión</h2>
        <?php 
            include ('validaciones/db.php');
            include ('validaciones/validar-index.php');
        ?>
        <form action="../trabajo-dashboard/validaciones/validar-index.php" method="post">
            <div class="documento">
                <input type="number" placeholder="Número de documento" name="documento" class="no-spinners">
            </div>
            <div class="contraseña">
                <input type="password" placeholder="Contraseña" name="contraseña">
            </div>
            <input type="submit" value="Iniciar" name="btn"><br>
            <br>
        </form>
    </div>
</body>
</html>