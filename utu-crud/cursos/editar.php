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

$id = $_GET['id'];

// Curso actual
$curso = $con->query("SELECT * FROM cursos WHERE id=$id")->fetch_assoc();

// Niveles
$niveles = $con->query("SELECT * FROM niveles");

if ($_POST) {
    $sql = "UPDATE cursos SET
        nombre='{$_POST['nombre']}',
        descripcion='{$_POST['descripcion']}',
        horas={$_POST['horas']},
        fechaInicio='{$_POST['fechaInicio']}',
        nivelId={$_POST['nivelId']}
        descripcion={$_POST['descripcion']}
        WHERE id=$id";

    $con->query($sql);
    header("Location: listar.php");
}
?>

<form method="POST">
    Nombre:<br>
    <input type="text" name="nombre" value="<?= $curso['nombre'] ?>" required><br><br>

    Descripción:<br>
    <textarea name="descripcion"><?= $curso['descripcion'] ?></textarea><br><br>

    Horas:<br>
    <input type="number" name="horas" value="<?= $curso['horas'] ?>" required><br><br>

    Fecha de inicio:<br>
    <input type="date" name="fechaInicio" value="<?= $curso['fechaInicio'] ?>" required><br><br>

    Nivel:<br>
    <select name="nivelId">
        <?php while ($n = $niveles->fetch_assoc()) { ?>
            <option value="<?= $n['id'] ?>"
                <?= $n['id'] == $curso['nivelId'] ? 'selected' : '' ?>>
                <?= $n['nombre'] ?> (<?= $n['nivel'] ?>)
            </option>
        <?php } ?>
    </select><br><br>

    <button>Actualizar</button>
</form>

</body>
</html>