<?php
// Incluir la conexión a la base de datos
$conexion = include './db.php';

// Verificar si la conexión fue exitosa
if ($conexion instanceof mysqli) {

    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $DNI = $_POST["documento"];
    $comentario = $_POST["comentario"];
    $especialidad = $_POST["especialidad"];
    $fecha = $_POST["fecha"];

    // Preparar la consulta SQL para evitar inyección de SQL
    $sql = "INSERT INTO turnos (nombre, apellido, telefono, email, DNI, comentario, especialidad, fecha) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia SQL
    if ($stmt = $conexion->prepare($sql)) {

        // Vincular los parámetros con la consulta preparada
        $stmt->bind_param("ssssssss", $nombre, $apellido, $telefono, $email, $DNI, $comentario, $especialidad, $fecha);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "¡Turno reservado con éxito!";
            header('Location: ./turnos.php');
            exit;
        } else {
            echo "Error al guardar el turno: " . $stmt->error;
        }

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "Error al conectar a la base de datos.";
}
