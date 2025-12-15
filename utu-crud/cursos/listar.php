<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 40px;
    }

    h1, h2 {
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
        width: 80%;
        background: #fff;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #eaeaea;
    }

    form {
        background: #fff;
        padding: 20px;
        width: 400px;
        border: 1px solid #ccc;
    }

    input, textarea, select {
        width: 100%;
        padding: 6px;
        margin-top: 4px;
        margin-bottom: 10px;
    }

    button {
        padding: 8px 15px;
        background-color: #0066cc;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #004c99;
    }
</style>

<body>
 <?php
include("../db.php");
$con = conectar();

$sql = "SELECT cursos.*, niveles.nombre AS nivel_nombre
        FROM cursos
        JOIN niveles ON cursos.nivelId = niveles.id";

$resultado = $con->query($sql);
?>

<a href="../index.php">⬅ Volver al inicio</a>
<br><br>

<a href="crear.php">Nuevo Curso</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Horas</th>
    <th>Fecha Inicio</th>
    <th>Nivel</th>
    <th>Acciones</th>
</tr>

<?php while ($row = $resultado->fetch_assoc()) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nombre'] ?></td>
    <td><?= $row['horas'] ?></td>
    <td><?= $row['fechaInicio'] ?></td>
    <td><?= $row['nivel_nombre'] ?></td>
    <td>
        <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
        <a href="eliminar.php?id=<?= $row['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>
</table>
   
</body>
</html>