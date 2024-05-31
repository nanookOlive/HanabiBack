<?php

namespace EnsembleCartes;
require_once __DIR__."/Partie.php";

class HanabiPartie extends Partie{


    private int $nbBlueTokens=8;
    private int $nbRedTokens=3;
    private int $score=0;
    private static array $defausse = [];
    

    public function __construct(Int $nbPlayers)
    {   
        
        //$this->nbPlayers=$nbPlayers;
        switch($nbPlayers){
            case 2:
            case 3:
                $this->nbCartes=5;
                break;
            case 4:
            case 5:
                $this->nbCartes=4;
                break;
        }
        parent::__construct($nbPlayers,$this->nbCartes);
        
        define("DEFAUSSE",1);
        define("PIOCHE",1);
    }


   public static function addToDefausse(Carte $carte){
        array_push(self::$defausse,$carte);
   }

   public static function getDefausse(){
    return self::$defausse;
   }
}