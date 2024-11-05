<?php 
namespace EnsembleCartes;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
require_once __DIR__."/Socket.php";
require_once __DIR__.'/../vendor/autoload.php';

$server=IoServer::factory(
    new WsServer(
        new Socket
    ),8080
);

$server->run();

class Server{

    private static $server = null;


    private  function __construct(){
        $server=IoServer::factory(
            new WsServer(
                new Socket
            ),8080
        );
    }

    public static function launchServer(){
        if(self::$server == null){
            self::$server=new self();
            echo "server inactive..";
            echo "launching server ...";
            self::$server->run();

        }else{
            echo "server already running";

        }

    }

    public static function getServer(){
        return self::$server; 
    }

}