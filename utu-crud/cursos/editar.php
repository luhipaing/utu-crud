<?php
include("../db.php");
$con = conectar();

$id = $_GET['id'];

// Traer curso actual
$curso = $con->query("SELECT * FROM cursos WHERE id = $id")->fetch_assoc();

// Traer niveles
$niveles = $con->query("SELECT * FROM niveles");

$mensaje = "";

if ($_POST) {
    // Validación básica
    if (
        empty($_POST['nombre']) ||
        empty($_POST['descripcion']) ||
        empty($_POST['horas']) ||
        empty($_POST['fechaInicio']) ||
        empty($_POST['nivelId'])
    ) {
        $mensaje = " Todos los campos son obligatorios";
    } else {
        $sql = "UPDATE cursos SET
            nombre = '{$_POST['nombre']}',
            descripcion = '{$_POST['descripcion']}',
            horas = {$_POST['horas']},
            fechaInicio = '{$_POST['fechaInicio']}',
            nivelId = {$_POST['nivelId']}
            WHERE id = $id";

        $con->query($sql);
        header("Location: listar.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
        }

        h1 {
            color: #333;
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

        .error {
            color: red;
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>

<body>

<a href="listar.php">⬅ Volver a cursos</a>

<h1>Editar Curso</h1>

<?php if ($mensaje != "") { ?>
    <div class="error"><?= $mensaje ?></div>
<?php } ?>

<form method="POST">
    Nombre:
    <input type="text" name="nombre" value="<?= $curso['nombre'] ?>" required>

    Descripción:
    <textarea name="descripcion" required><?= $curso['descripcion'] ?></textarea>

    Horas:
    <input type="number" name="horas" value="<?= $curso['horas'] ?>" required>

    Fecha de inicio:
    <input type="date" name="fechaInicio" value="<?= $curso['fechaInicio'] ?>" required>

    Nivel:
    <select name="nivelId" required>
        <?php while ($n = $niveles->fetch_assoc()) { ?>
            <option value="<?= $n['id'] ?>"
                <?= $n['id'] == $curso['nivelId'] ? 'selected' : '' ?>>
                <?= $n['nombre'] ?> (<?= $n['nivel'] ?>)
            </option>
        <?php } ?>
    </select>

    <button>Actualizar</button>
</form>

</body>
</html>
