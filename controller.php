<?php
require_once "./model.php";
require_once "./view.php";

class PokemonController {
    private $model;
    private $view;     

    public function __construct($pokemonModel, $pokemonView) {
        $this->model = $pokemonModel;
        $this->view = $pokemonView;
    }

    public function getPokemon($idOrName) {
        $pokemon = $this->model->getPokemon($idOrName);
        $this->view->sendJson($pokemon);
    }

    public function getPokemons($genId = null) {
        // Utiliser le model pour récupérer la liste des pokemons
        // Utiliser la vue pour renvoyer la liste des pokemons au navigateur
    }
}

