<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión UTU</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            background: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #eaeaea;
        }

        a {
            text-decoration: none;
        }

        .btn {
            padding: 8px 15px;
            background-color: #0066cc;
            color: white;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #004c99;
        }
    </style>
</head>
<body>

<h1>Sistema de Gestión</h1>

<table>
    <tr>
        <th>Módulo</th>
        <th>Acción</th>
    </tr>
    <tr>
        <td>Niveles</td>
        <td>
            <a class="btn" href="niveles/listar.php">Entrar</a>
        </td>
    </tr>
    <tr>
        <td>Cursos</td>
        <td>
            <a class="btn" href="cursos/listar.php">Entrar</a>
        </td>
    </tr>
</table>

</body>
</html>
