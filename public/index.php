<?php

require '../src/Animales.php';


$animalsObj = new Animals();


$animals = $animalsObj->getAllAnimals();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Animales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Animales</h1><br><br>

        <br><br>
        <a href="new.php" class="btn btn-warning">Añadir Animal</a>

        <br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Tipo Animal</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($animals as $animal): ?>
                    <tr>
                        <td><?= $animal->nombre ?></td>
                        <td><?= $animal->descripcion ?></td>
                        <td><?= $animal->edad ?></td>
                        <td><?= $animal->tipo ?></td>
                        <td><a href="edit.php?id=<?= $animal->idanimal ?>" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="delete.php" method="POST">
                                <input type="hidden" id="id" name="id" value="<?= $animal->idanimal ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
