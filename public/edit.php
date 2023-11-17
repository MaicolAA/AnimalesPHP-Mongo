<?php
require '../src/animales.php';

$animalsManager = new Animals();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idanimal = $_GET['id'];

    $animal = $animalsManager->getAnimalById($idanimal);

    if (!$animal) {
        echo "Animal no encontrado.";
        exit;
    }
} else {
    echo "ID de animal no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Editar Animal</h2>

        <form method="POST" action="editar.php">
            <input type="hidden" name="idanimal" value="<?= $animal->idanimal ?>">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($animal->nombre) ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= htmlspecialchars($animal->descripcion) ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" value="<?= htmlspecialchars($animal->edad) ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Animal:</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="Mamifero" <?= ($animal->tipo == 'Mamifero') ? 'selected' : '' ?>>Mamifero</option>
                    <option value="Ave" <?= ($animal->tipo == 'Ave') ? 'selected' : '' ?>>Ave</option>
                    <option value="Reptil" <?= ($animal->tipo == 'Reptil') ? 'selected' : '' ?>>Reptil</option>
                    <option value="Pez" <?= ($animal->tipo == 'Pez') ? 'selected' : '' ?>>Pez</option>
                    <option value="Insecto" <?= ($animal->tipo == 'Insecto') ? 'selected' : '' ?>>Insecto</option>
                    <option value="Otro" <?= ($animal->tipo == 'Otro') ? 'selected' : '' ?>>Otro</option>
                </select>
            </div>
            <br><br>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
