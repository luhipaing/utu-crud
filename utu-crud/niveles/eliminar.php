<?php
include("../db.php");
$con = conectar();

$id = $_GET['id'];

// Verificar si el nivel está siendo usado en algún curso
$result = $con->query("SELECT COUNT(*) AS count FROM cursos WHERE nivelId = $id");
$data = $result->fetch_assoc();

if ($data['count'] > 0) {
    // Si el nivel está en uso, mostramos un mensaje y no lo borramos
    $mensaje = "No se puede eliminar este nivel porque está siendo utilizado en " . $data['count'] . " curso(s).";
} else {
    // Si no está en uso, lo eliminamos
    $con->query("DELETE FROM niveles WHERE id = $id");
    header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Nivel</title>

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

        .success {
            color: green;
            margin-bottom: 10px;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: #0066cc;
        }

        .btn {
            padding: 8px 15px;
            background-color: #0066cc;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #004c99;
        }
    </style>
</head>

<body>

<h1>Eliminar Nivel</h1>

<?php if (isset($mensaje)) { ?>
    <div class="error"><?= $mensaje ?></div>
    <a class="btn" href="listar.php">Volver al listado</a>
<?php } ?>

</body>
</html>
