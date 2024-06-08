<?php

namespace EnsembleCartes;
require_once __DIR__."/Partie.php";

class HanabiPartie extends Partie{


    private static int $nbBlueTokens=8;
    private static int $nbRedTokens=3;
    private static int $score=0;
    private static array $defausse = [];
    private bool $loose=false;
    private static array $piles=[
        "red"=>[false,false,false,false,false],
        "blue"=>[false,false,false,false,false],
        "green"=>[false,false,false,false,false],
        "white"=>[false,false,false,false,false],
        "yellow"=>[false,false,false,false,false],
    ];
    

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

   public static function getPile()
   {
    return self::$piles;
   }
   public static function setPile($color,$value){

    self::$piles[$color][$value-1]=true;
}

    public static function addPointScore()
    {
        self::$score ++;
    }

    public static function getScore():int
    {
        return self::$score;
    }

    // public static function getNbBlueTokens():int
    // {
    //     return $this->nbBlueTokens;
    // }
    public static function getStatus():string{
        $status=[
            "nbTokenBlue"=>self::$nbBlueTokens,
            "nbTokenRed"=>self::$nbRedTokens,
            "score"=>self::$score,
            "piles"=>self::$piles,
            "players"=>self::$players

        ];

        return json_encode($status);
    }
}