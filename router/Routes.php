<?php

namespace EnsembleCartes;

class Routes{

    private static $routes = [

        ['GET','init',PartieController::class,'init'],
        ['GET','status',PartieController::class,'getStatus'],
        ['GET','players',PartieController::class,'getPlayers'],
        ['GET','player/{pseudo}',PartieController::class,'getPlayerByPseudo'],
        ['POST','indice',PartieController::class,'getIndice'],
        ['GET','launchServer',PartieController::class,'launchServer'],
        ['GET','PartieExists',PartieController::class,'partieExists'],
        ['GET','create',PartieController::class,'create']
       
    ];

    public static function getRoutes():array 
    {
        return self::$routes;
    }
}