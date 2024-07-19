<?php

use Discord\Parts\Embed\Embed;
use Discord\Builders\MessageBuilder;

include 'database/Database.php';

class PingCommand
{
    public function execute($message, $args)
    {
        if ($message->author->bot || $message->content != 'ping') {
            return;
        }

        $u = new Database();
        $user = $u->getUser("mluki")[0];

        $embed = new Embed($args);
        $embed
            ->setTitle('Pong!')
            ->setDescription("{$user['username']}")
            ->setColor(0x00ff00);

        return $message->reply(MessageBuilder::new()
            ->addEmbed($embed));


    }
}