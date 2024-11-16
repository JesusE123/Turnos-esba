
<?php
$servername = "localhost";
$username = "root"; // Cambia esto si usas otro usuario
$password = ""; // Si usas contraseña, colócala aquí
$dbname = "argenven"; 
// Reemplaza con tu base de datos
$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion){
    die('no se ha podido realizar la conexion');
}else {
    // echo "se ha realizado la conexion a la db";
}

return $conexion;
?>


