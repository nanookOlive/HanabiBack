<?php
namespace EnsembleCartes;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Socket implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $connection){}
    public function onClose(ConnectionInterface $connection){}
    public function onMessage(ConnectionInterface $from,$content){}
    public function onError(ConnectionInterface $connection, \Exception $exception){}
}