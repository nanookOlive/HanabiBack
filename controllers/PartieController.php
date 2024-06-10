<?php
namespace EnsembleCartes;
session_start();

header("Access-Control-Allow-Origin:http://localhost:4200");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Optionally set the max age for preflight requests
header("Access-Control-Max-Age: 86400");

header("Access-Control-Allow-Credentials: true");
// Handle preflight OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // If you want to allow OPTIONS requests, respond with 200 OK
    header("HTTP/1.1 200 OK");
    exit();
}
class PartieController{

    public function createPartie(int $nbPlayers){

        $partie = new HanabiPartie($nbPlayers);
        $_SESSION["partie"]=\serialize($partie);
        //echo json_encode(session_id());
        
    }
    
    public function init(){
        $partie=\unserialize($_SESSION["partie"]);
        $partie->init();

        ($partie::getPlayers())[0]->setPseudo("Nanook");
        ($partie::getPlayers())[0]->setIp("192.1.0.123");
        ($partie::getPlayers())[1]->setPseudo("Piki");
        ($partie::getPlayers())[1]->setIp("193.1.0.123");
        $_SESSION["partie"]=\serialize($partie);
        echo json_encode(session_id());


       
    }
    public function getStatus(){
       echo  \unserialize($_SESSION["partie"])::getStatus();
    }
    public  function getPlayers(){

        echo json_encode(\unserialize($_SESSION["partie"])::getPlayers());
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
    public function getIndice( array $players){

        //on cherche les jouers selon leur pseudo
        $allPlayers = HanabiPartie::getPlayers();
        $pseudoPlayerA=$players["playerA"];
        $pseudoPlayerB=$players["playerB"];

        $tmpPlayerA=null;
        $tmpPlayerB=null;
        foreach($allPlayers as $player){
            if($player->getPseudo() == $pseudoPlayerA){
                $tmpPlayerA = $player; 
            }
        }
        foreach($allPlayers as $player){
            if($player->getPseudo() == $pseudoPlayerB){
                $tmpPlayerB = $player; 
            }
        }

        //
        
        //var_dump($tmpPlayerA->donnerIndice($tmpPlayerB));
        echo json_encode($tmpPlayerA->donnerIndice($tmpPlayerB));
        //var_dump(HanabiPartie::getJeu());
    }
    
    public function getPioche(){
        echo json_encode(HanabiPartie::getJeu());
    }

    public function partieExists(){
          //echo json_encode(HanabiPartie::partieExists());
          echo json_encode(\unserialize($_SESSION["partie"])::partieExists());
    }
}
