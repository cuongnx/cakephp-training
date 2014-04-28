<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use ChatServer\ChatServer;

require dirname(__DIR__)."/websocket-server/vendor/autoload.php";
$server = IoServer::factory(
  new WsServer(
    new ChatServer()
  ), 8081
);

$server->run();
