<?php

namespace EnsembleCartes;

class Routes{

    private static $routes = [

        ['GET','init',PartieController::class,'init'],
        ['GET','status',PartieController::class,'getStatus'],
        ['GET','players',PartieController::class,'getPlayers'],
        ['GET','player/{pseudo}',PartieController::class,'getPlayerByPseudo'],
        ['POST','indice',PartieController::class,'getIndice'],
        ['GET','pioche',PartieController::class,'getPioche'],
        ['GET','partieExists',PartieController::class,"partieExists"],
        ['POST','create',PartieController::class,"createPartie"],

        
       
    ];

    public static function getRoutes():array 
    {
        return self::$routes;
    }
}