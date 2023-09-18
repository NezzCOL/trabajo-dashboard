<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio Contraseña</title>
    <link rel="stylesheet" href="../css/style-pagina-inicio.css">
    <link rel="stylesheet" href="../css/registro-usuario.css">
</head>
<body>
    <div class="container">
        <div class="main-content">
            <h1>Registro de Usuario</h1>

            <div class="content-form">
                <form action="../validaciones/validaciones-pagina/validaciones-registro-usuarios.php" method="post">
                    <div class="content-form">

                        <div class="num-doc">
                            <label for="">Número de documento</label><br>
                            <input type="number" name="num-doc" required>
                        </div>

                        <div class="nombre">
                            <label for="">Nombre</label><br>
                            <input type="text" name="nombre" required>
                        </div>
                    </div>
                </form>
            </div>
</body>
</html>