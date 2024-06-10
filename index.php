<?php
namespace EnsembleCartes;

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/Jeu.php";
require_once __DIR__."/Partie.php";
require_once __DIR__."/Player.php";
require_once __DIR__."/HanabiPartie.php";
require_once __DIR__."/router/Router.php";
use EnsembleCartes\Router;


$route= new Router("EnsembleCartes");
$route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),$_SERVER["REQUEST_METHOD"]);


