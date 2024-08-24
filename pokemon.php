<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="asset/imagenes/favicon.png" />
    <title>Pokedex</title>
    <link rel="stylesheet" href="asset/styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="text-danger">Pokedex</h1>
    </div>
    <div class="container mt-4">
        <form method="GET" action="pokemon.php">
            <div class="input-group justify-content-center">
                <div class="form-outline w-50">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-danger"> <i class="bi bi-search"></i> </button>
            </div>
        </form><br><br>
        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
                <?php include 'pokemon-data.php'; ?>
            </div>
        </div>
    </div>

    <div class="mt-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>