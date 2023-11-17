<?php

require '../src/animales.php';

$animalsManager = new Animals();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idanimal = $_POST['idanimal']; 

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $edad = $_POST['edad'];

    
    $result = $animalsManager->editarAnimal($idanimal, $nombre, $tipo, $descripcion, $edad);

    if ($result) {
        header('Location: index.php');;
    } else {
        header('Location: edit.php');;
    }
}
