<!DOCTYPE html>
<html>
<head>
    <title>Crear Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="guardar.php" method="POST">
            <br>
            <h5 class="text-center">Crear Animal</h5>
            <br><br>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="fechanacimiento">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Animal:</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="Mamifero">Mamifero</option>
                    <option value="Ave">Ave</option>
                    <option value="Reptil">Reptil</option>
                    <option value="Pez">Pez</option>
                    <option value="Insecto">Insecto</option>
                    <option value="Otro">Otro</option>

                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-warning">Crear</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
