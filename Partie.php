<?php

namespace EnsembleCartes;

require_once __DIR__."/Jeu.php";
require_once __DIR__."/Player.php";

class Partie{

    private bool $partieExists = false;
    private array $jeu;
    protected static array $players=[];
    protected static Int $nbPlayers;
    protected Int $nbCartes;//nombre max de cartes dans un main
    //ou nombre decartes dans une main de départ
  


    public function __construct(Int $nbPlayers,Int $nbCartes){
        self::$nbPlayers=$nbPlayers;
        // $this->nbCartes=$nbCartes;
        define("NBPLAYERS",$nbPlayers);
        define("MAXCARTES",$nbCartes);
        $this->partieExists = true;
        $this->jeu=Jeu::getJeu(true);

    }

    public function init(){
        //on instancie les joueurs avec les infos fetch en connexion
        for($a=0;$a<self::$nbPlayers;$a++){
            $player=new Player();
            array_push(self::$players,$player);
        }
        Jeu::distribCartesOneByOne(self::$players,MAXCARTES);
    }
    
    public static function getExists():bool{
        return self::$partieExists;
    }
    public function getJeu():array
    {
        return $this->jeu;
    }

    public  static function getPlayers():array
    {
        return self::$players;
    }

    public function getNbPlayers():int 
    {
        return NBPLAYERS;
    }

}