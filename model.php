<?php

class PokemonModel {
    private $domain_name;
    private $base_api_url;

    private $base_api_url_gen;

    public function __construct() {
        $this->domain_name = "https://tyradex.app";
        $this->base_api_url = "/api/v1/pokemon/";        
        $this->base_api_url_gen = "/api/v1/gen/";        
    }

    public function getPokemon($idOrName) {
        $url = $this->domain_name . $this->base_api_url . $idOrName;
        $json = file_get_contents($url);

        $pokemon = json_decode($json, true);

        return $pokemon;
    }

    public function getPokemons($genId = null) {
        if (isset($genId)) {
            // Get pokemons from base_api_url_gen and ID
            return;
        } 

        // Get pokemon list from base_api
        return;
    }
}
