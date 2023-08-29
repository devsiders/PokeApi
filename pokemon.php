<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="asset/imagenes/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Pokédex</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1>Pokédex</h1>
    </div>
    <div class="container mt-4">
        <form method="GET" action="pokemon.php">
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
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];

                    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/' . $search; // URL de la API
                    $ch = curl_init($apiUrl); // Inicializar la sesión cURL
                
                    // Configurar las opciones cURL
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Devolver el resultado en lugar de imprimirlo
                    $response = curl_exec($ch); // Ejecutar la solicitud cURL
                    curl_close($ch); // Cerrar la sesión cURL
                
                    $data = json_decode($response, true); // Decodificar la respuesta JSON
                
                    // Traer los datos del pokémon
                    if (isset($data['sprites']['front_default'])) {
                        $imageUrl = $data['sprites']['front_default'];
                        echo '<div class="col-md-3">';
                        echo '<div class="card pokemon-card">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text text-md-left text-right">N°' . $data['id'] . '</p>';
                        echo '<img src="' . $imageUrl . '" class="card-img-top pokemon-img" alt="' . $data['name'] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title text-center">' . ucfirst($data['name']) . '</h5>';
                        foreach ($data['types'] as $typeData) {
                            echo '<p class="card-text text-center"> ' . $typeData['type']['name'] . '</p>';
                        }
                        echo '<p class="card-text">Altura: ' . $data['height'] . '</p>';
                        echo '<p class="card-text">Peso: ' . $data['weight'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        $nombreImagen = "pokemon.jpg";
                        $altura = 250;
                        $rutaImagen = "asset/imagenes/" . $nombreImagen;
                        echo '<div class="container text-center">';
                        echo "<img src='$rutaImagen' width='$altura' alt='Mi Imagen'>";
                        echo "<p>Nombre incorrecto del Pokémon</p>";
                        echo '</div>';
                    }

                } else {
                    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/?limit=6'; // Trae los 6 primeros pokemones
                    $ch = curl_init($apiUrl);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $data = json_decode($response, true);

                    foreach ($data['results'] as $pokemon) {
                        $pokemonDetails = file_get_contents($pokemon['url']);
                        $pokemonInfo = json_decode($pokemonDetails, true);
                        echo '<div class="col-md-3">';
                        echo '<div class="card h-100 pokemon-card">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text text-md-left text-right">N°' . $pokemonInfo['id'] . '</p>';
                        echo '<img src="' . $pokemonInfo['sprites']['front_default'] . '" class="card-img-top pokemon-img" alt="' . $pokemon['name'] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title text-center">' . ucfirst($pokemonInfo['name']) . '</h5>';
                        foreach ($pokemonInfo['types'] as $typeData) {
                            echo '<p class="card-text text-center"> ' . $typeData['type']['name'] . '</p>';
                        }
                        echo '<p class="card-text">Altura: ' . $pokemonInfo['height'] . '</p>';
                        echo '<p class="card-text">Peso: ' . $pokemonInfo['weight'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>