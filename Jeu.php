<?php 
namespace EnsembleCartes;

require_once __DIR__."/Carte.php";

use EnsembleCartes\Carte;

class Jeu{

    private static $jeu=[];
    private static $colors=[
        "red",
        "green",
        "blue",
        "yellow",
        "white"
    ];

    public static function getJeu(bool $shuffled=false):array
    {
        $index = 0;
        foreach(self::$colors as $color){
            for($valeur=1;$valeur<6;$valeur++){

               switch($valeur){
                case 1:
                    for($a=0;$a<3;$a++){
                        $tmpCarte=new Carte($index,$color,$valeur);
                        array_push(self::$jeu,$tmpCarte);
                        $index ++;
                    };
                    break;
                case 2:
                case 3:
                case 4:
                    for($a=0;$a<2;$a++){
                        $tmpCarte=new Carte($index,$color,$valeur);
                        array_push(self::$jeu,$tmpCarte);
                        $index++;

                    };
                    break;
                case 5:
                    $tmpCarte=new Carte($index,$color,$valeur);
                    array_push(self::$jeu,$tmpCarte);
                    $index ++;
                    break;
               }
            }

        }
        if($shuffled){
            //mélange le jeu
            shuffle(self::$jeu);
        }
        return self::$jeu;
        
    }

    //distribue n fois 1 carte à n joueurs chacun leur tour
    public static function distribCartesOneByOne(Array $players)
    {
        for($a=0;$a<MAXCARTES;$a++){
            foreach($players as $player){
                $carte=array_shift(self::$jeu);
                $player->addCarte($carte);
             }
        }
        
    }
    public static function getCarte():Carte{
        return array_shift(self::$jeu);
    }
    public static function getPioche(){
        return self::$jeu;
    }
   
}