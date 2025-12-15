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

if ($_POST) {
    $nombre = $_POST['nombre'];
    $nivel = $_POST['nivel'];

    $sql = "INSERT INTO niveles (nombre, nivel)
            VALUES ('$nombre', '$nivel')";
    $con->query($sql);

    header("Location: listar.php");
}
?>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Nivel:
    <select name="nivel">
        <option value="basico">Básico</option>
        <option value="intermedio">Intermedio</option>
        <option value="avanzado">Avanzado</option>
    </select><br>
    <button>Guardar</button>
</form>
</body>
</html>