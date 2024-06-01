<?php
namespace EnsembleCartes;
require_once __DIR__."/../HanabiPartie.php";
require_once __DIR__."/../Player.php";

use PHPUnit\Framework\TestCase;


class TestPile extends TestCase{

    public static function pileProvider():array
    {
        return  [
            ["2","red",false],
            ["1","red",true],
            ["3","blue",false],
            ["2","red",true],
            ["1","white",true],
            ["2","white",true],
            ["5","yellow",false],
            ["1","green",true],
            ["2","green",true],
            ["4","red",false],
            ["3","red",true],
            ["4","red",true],
            ["2","red",false],
            ["2","red",false],
            ["2","red",false],

        ];
    }


    /**
     * @dataProvider pileProvider
     */
    public function testPile($value,$color,$expected){

        $partie = new HanabiPartie(3);
        $partie->init();
        $player = ($partie->getPlayers())[0];

        $this->assertEquals($expected,$player->poseCarte(new Carte($color,$value)));
    }
}