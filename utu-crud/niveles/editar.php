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

// Traer datos actuales
$nivel = $con->query("SELECT * FROM niveles WHERE id=$id")->fetch_assoc();

// Actualizar
if ($_POST) {
    $nombre = $_POST['nombre'];
    $nivelTxt = $_POST['nivel'];

    $sql = "UPDATE niveles
            SET nombre='$nombre', nivel='$nivelTxt'
            WHERE id=$id";

    $con->query($sql);
    header("Location: listar.php");
}
?>

<form method="POST">
    Nombre:
    <input type="text" name="nombre" value="<?= $nivel['nombre'] ?>" required><br>

    Nivel:
    <select name="nivel">
        <option value="basico" <?= $nivel['nivel']=='basico'?'selected':'' ?>>Básico</option>
        <option value="intermedio" <?= $nivel['nivel']=='intermedio'?'selected':'' ?>>Intermedio</option>
        <option value="avanzado" <?= $nivel['nivel']=='avanzado'?'selected':'' ?>>Avanzado</option>
    </select><br>

    <button>Actualizar</button>
</form>
    
</body>
</html>
<?php
