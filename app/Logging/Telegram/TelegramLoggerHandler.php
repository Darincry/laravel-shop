<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    protected string $token;
    protected int $chatId;

    public function __construct(array $config)
    {
        $this->token = $config['token'];
        $this->chatId = (int) $config['chat_id'];

        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
    }

    public function write(LogRecord $record): void
    {
        TelegramBotApi::sendMessage(
            $this->token,
            $this->chatId,
            $record['formatted']
        );
    }
}
