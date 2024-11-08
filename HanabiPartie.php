<?php

namespace EnsembleCartes;
require_once __DIR__."/Partie.php";
require_once __DIR__."/Player.php";
use EnsembleCartes\Partie;
class HanabiPartie extends Partie implements \Serializable{


    private static int $nbBlueTokens=8;
    private static int $nbRedTokens=3;
    private static int $score=0;
    private static array $defausse = [];
    private bool $loose=false;
    private static array $piles=[
        "rouge"=>[false,false,false,false,false],
        "bleu"=>[false,false,false,false,false],
        "vert"=>[false,false,false,false,false],
        "blanc"=>[false,false,false,false,false],
        "jaune"=>[false,false,false,false,false],
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

    public function serialize(){
        return serialize(
            [
                "parentData"=>parent::serialize(),
                "loose"=>$this->loose,
                "staticData"=>[
                "nbBlueTokens"=>self::$nbBlueTokens,
                "nbRedTokens"=>self::$nbRedTokens,
                "score"=>self::$score,
                "defausse"=>self::$defausse,
                "piles"=>self::$piles]
            ]
        );
    }
    public function unserialize(string $data){
        $unData=unserialize($data);
        parent::unserialize($unData["parentData"]);
        $this->loose=$unData["loose"];
        $staticData=$unData["staticData"];
        self::$nbBlueTokens=$staticData["nbBlueTokens"];
        self::$nbRedTokens=$staticData["nbRedTokens"];
        self::$score=$staticData["score"];
        self::$defausse=$staticData["defausse"];
        self::$piles=$staticData["piles"];


    }
   public static function addToDefausse(Carte $carte){
        array_push(self::$defausse,$carte);
   }

   public static function getDefausse(){
    return self::$defausse;
   }

   public static function getCarte():Carte{
    return array_shift(self::$jeu);
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
            "players"=>self::$players,
            "pioche"=>self::$jeu

        ];

        return json_encode($status);
    }
}