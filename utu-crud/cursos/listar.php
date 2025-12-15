<?php
include("../db.php");
$con = conectar();

$sql = "SELECT cursos.*, niveles.nombre AS nivel_nombre
        FROM cursos
        JOIN niveles ON cursos.nivelId = niveles.id";

$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Cursos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #0066cc;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            background: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #eaeaea;
        }

        .acciones a {
            margin-right: 8px;
        }
    </style>
</head>

<body>

<h1>Listado de Cursos</h1>

<a href="../index.php"> Volver al inicio</a>
<a href="crear.php"> Nuevo Curso</a>
<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Horas</th>
        <th>Fecha Inicio</th>
        <th>Nivel</th>
        <th>Acciones</th>
    </tr>

    <?php while ($row = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['descripcion'] ?></td>
        <td><?= $row['horas'] ?></td>
        <td><?= $row['fechaInicio'] ?></td>
        <td><?= $row['nivel_nombre'] ?></td>
        <td class="acciones">
            <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
            <a href="eliminar.php?id=<?= $row['id'] ?>"
               onclick="return confirm('¿Seguro que desea eliminar este curso?')">
               Eliminar
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
