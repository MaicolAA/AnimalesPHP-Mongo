<?php


require '../src/Animales.php';

$animals = new Animals();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $edad = $_POST['edad'];
    $tipo = $_POST['tipo'];

    // Guarda el animal en la base de datos
    $result = $animals->saveAnimal($nombre, $tipo, $descripcion, $edad);

    if ($result) {
        // Redirige a la página principal o a donde desees después de almacenar los datos
        header('Location: index.php');
        exit;
    } else {
        // Manejo de error (puedes redirigir a una página de error)
        echo "Error al insertar en la base de datos.";
    }
} else {
    // Si no se ha enviado el formulario, redirige a alguna página de error o vuelve a la página del formulario
    header('Location: new.php');
    exit;
}
