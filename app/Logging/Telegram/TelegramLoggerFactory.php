<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerFactory
{
    public function __invoke(array $confing)
    {
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler($confing));
        return $logger;
    }
}
