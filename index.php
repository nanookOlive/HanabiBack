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
$main=$players[0]->getMain();

showMain($main);
echo "removing carte 4<br>";
showMain($players[0]->defausse($main[2]));







function showMain( $main){
    if($main == false){
        echo "poupi";
    }else{
        foreach($main as $carte){
            echo $carte->getValue()." ".$carte->getColor()."<br>";
        }  
    }
   
}

