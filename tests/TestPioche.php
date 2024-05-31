<?php
require_once __DIR__."/../Player.php";
require_once __DIR__."/../Jeu.php";

use PHPUnit\Framework\TestCase;
use EnsembleCartes\Jeu;
use EnsembleCartes\Player;

class TestPioche extends TestCase{


    private array $players=[];
    private static Player $playerA;
    private static Player $playerB;

    public static function setUpBeforeClass():void{

        parent::setUpBeforeClass();
        self::$playerA=new Player();
        self::$playerB=new Player();
        array_push(self::$players,self::$playerA);
        array_push(self::$players,self::$playerB);        
    }

    public static function distribProvider():array{
        return[
            [true,self::$playerA,5],
            [true,self::$playerB,5],
            [true,self::$playerA,2],
            [true,self::$playerB,2],
            [true,self::$playerA,5],
            [true,self::$playerA,5],
            [true,self::$playerA,5],


        ];
    }

    /**
     * @dataProvider distribProvider
     */
    public function testDistrib(bool $expected, Player $player,Int $nbCartes){
        Jeu::getJeu();
        Jeu::distribCartesOneByOne($this->$players,$nbCartes);
        $this->assertEquals($expected,$player->getNbCartesInMain(),$nbCartes);
    }






}