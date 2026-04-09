<?php

require_once "./controller.php";

$model = new PokemonModel();
$view = new PokemonView();

$controller = new PokemonController($model, $view);

$controller->getPokemon("dracaufeu");
