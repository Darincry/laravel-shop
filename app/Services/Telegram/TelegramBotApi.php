<?php

namespace App\Services\Telegram;

use Illuminate\Support\Facades\Http;

class TelegramBotApi
{
    const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $text)
    {
        Http::get(static::HOST . $token . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $text
        ]);
    }
}
