<?php
namespace EnsembleCartes;

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
