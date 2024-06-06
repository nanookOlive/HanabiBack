<?php

namespace EnsembleCartes;

class Routes{

    private static $routes = [

        ['GET','init',PartieController::class,'init'],
       
    ];

    public static function getRoutes():array 
    {
        return self::$routes;
    }
}