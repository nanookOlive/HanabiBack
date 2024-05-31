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

$main=$player->getMain();

echo "main initiale <br>";
showMain($main);
echo'<br>';
echo "on defausse la 4<br>";
$player->defausse($main[3]);

echo "la defausse <br>";
showMain(HanabiPartie::getDefausse());
echo'<br>';

$main=$player->getMain();

echo "main 2 <br>";
showMain($main);
echo'<br>';
echo "on defausse la 1<br>";
$player->defausse($main[0]);
echo "la defausse <br>";
showMain(HanabiPartie::getDefausse());
echo'<br>';

$main=$player->getMain();

echo "main 3 <br>";
showMain($main);
echo'<br>';
echo "on defausse la 2<br>";
$player->defausse($main[1]);
echo "la defausse <br>";
showMain(HanabiPartie::getDefausse());
echo'<br>';


function showMain( $main){
    if($main == false){
        echo "poupi";
    }else{
        foreach($main as $index => $carte){
            echo $carte->getValue()." ".$carte->getColor()."<br>";
        }  
    }
   
}

