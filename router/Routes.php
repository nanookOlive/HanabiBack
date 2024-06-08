<?php

namespace EnsembleCartes;

class Routes{

    private static $routes = [

        ['GET','init',PartieController::class,'init'],
        ['GET','status',PartieController::class,'getStatus'],
        ['GET','players',PartieController::class,'getPlayers'],
        ['GET','player/{pseudo}',PartieController::class,'getPlayerByPseudo'],
        ['POST','indice',PartieController::class,'getIndice'],
       
    ];

    public static function getRoutes():array 
    {
        return self::$routes;
    }
}