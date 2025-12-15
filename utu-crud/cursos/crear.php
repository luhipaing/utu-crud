<?php
include("../db.php");
$con = conectar();

$mensaje = "";

// Traer niveles para el select
$niveles = $con->query("SELECT * FROM niveles");

if ($_POST) {
    if (
        empty($_POST['nombre']) ||
        empty($_POST['descripcion']) ||
        empty($_POST['horas']) ||
        empty($_POST['fechaInicio']) ||
        empty($_POST['nivelId'])
    ) {
        $mensaje = "Todos los campos son obligatorios";
    } else {
        $sql = "INSERT INTO cursos
        (nombre, descripcion, horas, fechaInicio, nivelId)
        VALUES (
            '{$_POST['nombre']}',
            '{$_POST['descripcion']}',
            {$_POST['horas']},
            '{$_POST['fechaInicio']}',
            {$_POST['nivelId']}
        )";

        $con->query($sql);
        header("Location: listar.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Curso</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
        }

        h1 {
            color: #333;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-weight: bold;
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

        a {
            text-decoration: none;
            color: #0066cc;
        }
    </style>
</head>

<body>

<h1>Crear Curso</h1>

<a href="listar.php">⬅ Volver</a><br><br>

<?php if ($mensaje != "") { ?>
    <div class="error"><?= $mensaje ?></div>
<?php } ?>

<form method="POST">
    Nombre:
    <input type="text" name="nombre">

    Descripción:
    <textarea name="descripcion"></textarea>

    Horas:
    <input type="number" name="horas">

    Fecha de inicio:
    <input type="date" name="fechaInicio">

    Nivel:
    <select name="nivelId">
        <option value="">Seleccione un nivel</option>
        <?php while ($n = $niveles->fetch_assoc()) { ?>
            <option value="<?= $n['id'] ?>">
                <?= $n['nombre'] ?> (<?= $n['nivel'] ?>)
            </option>
        <?php } ?>
    </select>

    <button>Guardar</button>
</form>

</body>
</html>
