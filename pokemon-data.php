<?php
// pokemon_data.php

// Mapa de colores para los tipos de Pokémon
$typeColors = [
    'grass' => 'success',
    'fire' => 'danger',
    'water' => 'primary',
    'electric' => 'warning',
    'psychic' => 'info',
    'ice' => 'light',
    'dragon' => 'dark',
    'fairy' => 'secondary',
    'bug' => 'success',
    'rock' => 'dark',
    'ghost' => 'secondary',
    'steel' => 'light',
    'flying' => 'primary',
    'normal' => 'secondary'
];

function fetchPokemonData($search) {
    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/' . $search;
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

function renderPokemonCard($data, $typeColors) {
    $imageUrl = $data['sprites']['front_default'];
    echo '<div class="col-md-3">';
    echo '<div class="card pokemon-card">';
    echo '<div class="card-body">';
    echo '<p class="card-text text-md-left fw-bold text-right">N°' . $data['id'] . '</p>';
    echo '<img src="' . $imageUrl . '" class="card-img-top pokemon-img" alt="' . $data['name'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title text-center">' . ucfirst($data['name']) . '</h5>';
    echo '<div class="d-flex flex-wrap justify-content-center">';
    foreach ($data['types'] as $typeData) {
        $type = $typeData['type']['name'];
        $class = 'type-' . $type;
        echo '<span class="badge ' . $class . ' text-light m-1">' . ucfirst($type) . '</span>';
    }
    echo '</div>';
    echo '<p class="card-text">Altura: ' . $data['height'] . ' m</p>';
    echo '<p class="card-text">Peso: ' . $data['weight'] . ' kg</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

// Manejo de búsqueda
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $data = fetchPokemonData($search);

    if (isset($data['sprites']['front_default'])) {
        renderPokemonCard($data, $typeColors);
    } else {
        $nombreImagen = "pokemon.jpg";
        $altura = 250;
        $rutaImagen = "asset/imagenes/" . $nombreImagen;
        echo '<div class="container text-center">';
        echo "<img src='$rutaImagen' width='$altura' alt='Mi Imagen'>";
        echo "<p>No hay datos disponible.</p>";
        echo "<a href='pokemon.php' class='btn btn-danger'><i class='bi bi-arrow-left'></i></a>";
        echo '</div>';
    }
} else {
    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/?limit=6';
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);

    foreach ($data['results'] as $pokemon) {
        $pokemonDetails = file_get_contents($pokemon['url']);
        $pokemonInfo = json_decode($pokemonDetails, true);
        renderPokemonCard($pokemonInfo, $typeColors);
    }
}
?>
