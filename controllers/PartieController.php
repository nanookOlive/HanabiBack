<?php
namespace EnsembleCartes;

header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Optionally set the max age for preflight requests
header("Access-Control-Max-Age: 86400");

// Handle preflight OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // If you want to allow OPTIONS requests, respond with 200 OK
    header("HTTP/1.1 200 OK");
    exit();
}

class PartieController{

    public function createPartie(){}
    
    public function init(){
        echo "endpoint reached";
    }
    public function getStatus(){
        echo HanabiPartie::getStatus();
    }
    public  function getPlayers(){
        echo json_encode(HanabiPartie::getPlayers());
    }
    public function getPlayerByPseudo(string $pseudo){
        //on cherche dans la liste de tous les joueurs
        $players=HanabiPartie::getPlayers();
        $tmpPlayer=null;
        foreach($players as $player){
            if($player->getPseudo() == $pseudo){
                $tmpPlayer = $player; 
            }
        }
        if($tmpPlayer != null){
            echo json_encode($tmpPlayer);
        }else{
            echo "player not found";
        }
    }
    
}
