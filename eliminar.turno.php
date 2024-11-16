<?php
// Conectar a la base de datos
$conexion = include './db.php';

// Verificar si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Obtener el 'id' de la URL

    // Consultar si el ID existe antes de eliminar (opcional, pero recomendado)
    $sqlCheck = $conexion->prepare("SELECT * FROM turnos WHERE id = ?");
    $sqlCheck->bind_param("i", $id); // Usamos "i" para un parámetro entero
    $sqlCheck->execute();
    $resultado = $sqlCheck->get_result();

    if ($resultado->num_rows > 0) {
        // Si el turno existe, proceder con la eliminación
        $sqlDelete = $conexion->prepare("DELETE FROM turnos WHERE id = ?");
        $sqlDelete->bind_param("i", $id); // Usamos "i" para un parámetro entero
        if ($sqlDelete->execute()) {
            // Si se elimina correctamente, redirigir a la lista de turnos
            header("Location: ./index.html");
            exit();
        } else {
            // Si hay un error al eliminar
            echo "Error al eliminar el turno: " . $conexion->error;
        }
    } else {
        // Si el ID no se encuentra en la base de datos
        echo "El turno con el ID proporcionado no existe.";
    }
} else {
    // Si no se proporciona un ID en la URL
    echo "ID de turno no especificado.";
}
