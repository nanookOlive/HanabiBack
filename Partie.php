<?php

namespace EnsembleCartes;

require_once __DIR__."/Jeu.php";
require_once __DIR__."/Player.php";

class Partie{

    protected static bool $exists=false;
    protected static array $jeu;
    protected static array $players=[];
    protected static Int $nbPlayers;
    protected Int $nbCartes;//nombre max de cartes dans un main
    //ou nombre decartes dans une main de départ
  


    public function __construct(Int $nbPlayers,Int $nbCartes){
        self::$nbPlayers=$nbPlayers;
        // $this->nbCartes=$nbCartes;
        define("NBPLAYERS",$nbPlayers);
        define("MAXCARTES",$nbCartes);

        self::$jeu=Jeu::getJeu(true);

    }

    public static function init(){
        self::$exists=true;
        //on instancie les joueurs avec les infos fetch en connexion 
        for($a=0;$a<self::$nbPlayers;$a++){
            $player=new Player();
            array_push(self::$players,$player);
        }
        self::distribCartesOneByOne(self::$players,self::$jeu);

    }
   
    // public  function init(){
    //     //on instancie les joueurs avec les infos fetch en connexion 
    //     for($a=0;$a<self::$nbPlayers;$a++){
    //         $player=new Player();
    //         array_push(self::$players,$player);
    //     }
    //     self::distribCartesOneByOne(self::$players,self::$jeu);
    //     self::$exists=true;


    // }
    
    public static function distribCartesOneByOne()
    {
        for($a=0;$a<MAXCARTES;$a++){
            foreach(self::$players as $player){
                $carte=array_shift(self::$jeu);
                $player->addCarte($carte);
             }
        }
        
    }
    public static function getJeu():array
    {
        return self::$jeu;
    }

    public  static function getPlayers():array
    {
        return self::$players;
    }

    public function getNbPlayers():int 
    {
        return NBPLAYERS;
    }
    public static function partieExists():bool 
    {
        return self::$exists;
    }

}