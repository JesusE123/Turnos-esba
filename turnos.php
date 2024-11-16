<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />

</head>

<body>

    <!--Title-->
    <div class="container mt-3">
        <h1 class="text-center">Mis turnos</h1>
    </div>

    <!--Table-->
    <div class="container">
        <div class="container mb-3">
            <a href="./index.html" class="btn btn-primary">Agregar</a>

        </div>
        <!-- Campo de búsqueda -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar turno">
        </div>
        <div class="table-responsive">
            <table class="table table-striped shadow">
                <thead class="table-dark text-center table-header">
                    <tr>
                       
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Email</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Comentarios</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $conexion = include './db.php';
                    $sql = $conexion->query("SELECT * FROM turnos");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                           
                            <td scope="row">
                                <?php echo $resultado['Nombre'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Apellido'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Especialidad'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Email'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['DNI'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Telefono'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Comentario'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Fecha'] ?>
                            </td>

                            <td scope="row" class="d-flex ">
                                <a href="./eliminar.turno.php?id=<?php echo $resultado['id']; ?>"
                                    onclick="return confirm('¿Seguro que desea eliminar este turno?');"
                                    class="btn btn-danger">Eliminar</a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div id="noRecordsMessage" class="alert alert-warning text-center" style="display: none;">No hay registros</div>
        </div>
    </div>
    <script src="./script.js"></script>
</body>

</html>