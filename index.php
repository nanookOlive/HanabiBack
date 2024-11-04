<?php
namespace EnsembleCartes;

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/Jeu.php";
require_once __DIR__."/Partie.php";
require_once __DIR__."/Player.php";
require_once __DIR__."/HanabiPartie.php";
require_once __DIR__."/router/Router.php";
use EnsembleCartes\Router;

// $partie = new HanabiPartie(2);

// $partie->init();
// Server::launchServer();
// ($partie::getPlayers())[0]->setPseudo("Nanook");
// ($partie::getPlayers())[0]->setIp("192.1.0.123");
// ($partie::getPlayers())[1]->setPseudo("Piki");
// ($partie::getPlayers())[1]->setIp("193.1.0.123");


$route= new Router("EnsembleCartes");
$route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),$_SERVER["REQUEST_METHOD"]);





// $players=$partie->getPlayers();
// $player=$players[0];

// echo $player->poseCarte(new Carte("red",1));
// echo "<pre>";
// var_dump(HanabiPartie::getPile());
// echo "<pre>";
// echo "score = ".HanabiPartie::getScore()."<br>";

// echo $player->poseCarte(new Carte("red",2));
// echo "<pre>";
// var_dump(HanabiPartie::getPile());
// echo "<pre>";
// echo "score = ".HanabiPartie::getScore()."<br>";

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

