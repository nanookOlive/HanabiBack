<?php

namespace EnsembleCartes;

require_once __DIR__."/Jeu.php";
require_once __DIR__."/Player.php";

class Partie{

    private array $jeu;
    private array $players=[];
    protected Int $nbPlayers;
    protected Int $nbCartes;//nombre max de cartes dans un main
    //ou nombre decartes dans une main de départ
  


    public function __construct(Int $nbPlayers,Int $nbCartes){
        $this->nbPlayers=$nbPlayers;
        // $this->nbCartes=$nbCartes;
        define("NBPLAYERS",$nbPlayers);
        define("MAXCARTES",$nbCartes);

        $this->jeu=Jeu::getJeu(true);

    }

    public function init(){
        //on instancie les joueurs avec les infos fetch en connexion
        for($a=0;$a<$this->nbPlayers;$a++){
            $player=new Player();
            array_push($this->players,$player);
        }
        Jeu::distribCartesOneByOne($this->players,MAXCARTES);
    }
    

    public function getJeu():array
    {
        return $this->jeu;
    }

    public  function getPlayers():array
    {
        return $this->players;
    }

    public function getNbPlayers():int 
    {
        return NBPLAYERS;
    }

}