<?php

include __DIR__ . '/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

include 'commands/ping.php';

include 'CommandHandler.php';

$discord = new Discord([
    'token' => getenv('TOKEN'),
    'intents' => Intents::getDefaultIntents()
    //      | Intents::MESSAGE_CONTENT, // Note: MESSAGE_CONTENT is privileged, see https://dis.gd/mcfaq
]);

$discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
    $pingh = new PingCommand();
    $pingh->execute($message, $discord);

});

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // print_r(scandir(__DIR__ . '/commands', SCANDIR_SORT_DESCENDING));

});



$discord->run();

