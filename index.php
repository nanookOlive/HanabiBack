<?php
namespace EnsembleCartes;

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/Jeu.php";
require_once __DIR__."/Partie.php";
require_once __DIR__."/Player.php";
require_once __DIR__."/HanabiPartie.php";


$partie = new HanabiPartie(3);

$partie->init();



$players=$partie->getPlayers();
$player=$players[0];

echo $player->poseCarte(new Carte("red",1));
echo "<pre>";
var_dump(HanabiPartie::getPile());
echo "<pre>";

echo $player->poseCarte(new Carte("red",2));
echo "<pre>";
var_dump(HanabiPartie::getPile());
echo "<pre>";

// $main=$player->getMain();

// echo "main initiale <br>";
// showMain($main);
// echo'<br>';
// echo "on defausse la 4<br>";
// $player->defausse($main[3]);
// echo "<pre>";
// var_dump(($player->donnerIndice($player))["couleurs"]);
// echo "<pre>";


function showMain( $main){
    if($main == false){
        echo "poupi";
    }else{
        foreach($main as $index => $carte){
            echo $carte->getValue()." ".$carte->getColor()."<br>";
        }  
    }
   
}

