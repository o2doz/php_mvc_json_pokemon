<?php
class PokemonView {
    public function __construct() {}

    public function sendJson($data) {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');

        echo json_encode($data);
    }
}
