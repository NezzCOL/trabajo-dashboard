<?php
if (!empty($_POST["btn"])){
    
    if (!empty($_POST['usuario']) and !empty($_POST['contraseña'])) {

        $usuario = $_POST['usuario'];
        $contraseña = md5($_POST['contraseña']);
        $md5contraseña = 
        $sql=$conexion->query ("SELECT * FROM usuarios where usuario = '$usuario' and password = '$contraseña' ");
        if ($sql->fetch_object()) {
            header("location: pagina/pagina-inicio.php");
        } else {
            echo "<div class='error'> El usuario no existe </div>";
        }

    } else {
        echo "<div class='error'> Los campos estan vacios </div>";
    }

}
?>