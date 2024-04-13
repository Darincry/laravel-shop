<?php

namespace App\Services\Telegram\Exceptions;

use Illuminate\Http\Request;

class TelegramBotApiException extends \Exception
{
    public function report()
    {

    }

    public function render(Request $request)
    {
        return response()->json([]);
    }
}
