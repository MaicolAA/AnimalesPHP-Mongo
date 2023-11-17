<?php

require '../src/Animales.php';


if (isset($_POST['id'])) {
    $idAnimal = $_POST['id'];


    $animals = new Animals();

    $animal = $animals->getAnimalById($idAnimal);

    if ($animal) {
        if ($animal->eliminarAnimal()) {
            echo "Animal eliminado correctamente.";
            header('Location: index.php');
        } else {
            echo "Error al eliminar el animal.";
        }
    } else {
        echo "Animal no encontrado.";
    }
} else {
    echo "ID de animal no proporcionado.";
}
?>
