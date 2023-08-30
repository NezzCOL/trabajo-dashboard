<?php
if(!empty($_POST["btn"])){
    
    $conexion = mysqli_connect("localhost","root","","login");

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT * FROM usuarios where usuario = '$usuario' and password = '$contraseña' ";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);

    if($filas){
        header("location: ../../../../../trabajo-dashboard/pagina/pagina-inicio.php");
    }else{
        echo "<div class='error'>Error, datos incorrectos</div>";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>