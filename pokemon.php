<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="asset/imagenes/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Pokédex</title>
    <link rel="stylesheet" href="asset/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1>Pokédex</h1>
    </div>
    <div class="container mt-4">
        <form method="GET" action="pokedex.php">
            <div class="input-group">
                <div class="form-outline">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-danger"> <i class="bi bi-search"></i> </button>
            </div>
        </form><br><br>
        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
                <?php
                require 'pokedex.php';
                ?>
            </div>
        </div>
    </div>

    <div class="mt-5"></div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>