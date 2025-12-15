<?php
include("../db.php");
$con = conectar();

$id = $_GET['id'];

$con->query("DELETE FROM cursos WHERE id=$id");

header("Location: listar.php");
