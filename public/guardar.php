<?php


require '../src/Animales.php';

$animals = new Animals();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $edad = $_POST['edad'];
    $tipo = $_POST['tipo'];

    $result = $animals->saveAnimal($nombre, $tipo, $descripcion, $edad);

    if ($result) {
       
        header('Location: index.php');
        exit;
    } else {
        echo "Error al insertar en la base de datos.";
    }
} else {
    header('Location: new.php');
    exit;
}
