<?php

class PingCommand
{
    public function execute($message, $args)
    {
        if ($message->author->bot || $message->content != 'ping') {
            return;
        }
        print_r($message);
        return $message->reply('Pong!');

    }
}