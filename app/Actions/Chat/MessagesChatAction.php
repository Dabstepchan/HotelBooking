<?php

namespace App\Actions\Chat;

use App\Contracts\Chat\MessagesChatActionContract;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessagesChatAction implements MessagesChatActionContract
{
    public function __invoke(): JsonResponse
    {
        $messages = Message::query()->with('user')->get();
        return response()->json(['messages' => $messages], 200);
    }
}
