<?php

namespace App\WebSockets;

use BeyondCode\LaravelWebSockets\WebSockets\WebSocketHandler;
use Illuminate\Support\Facades\Log;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class CustomWebSocketHandler extends WebSocketHandler
{

    
    
    public function onClose(ConnectionInterface $connection)
    {
        parent::onClose($connection);
        Log::info('Connection closed: ');
    }
}
