<?php

namespace App\Actions\Chat;

use App\Contracts\Chat\IndexChatActionContract;
use Illuminate\Http\JsonResponse;

class IndexChatAction implements IndexChatActionContract
{
    public function __invoke(): JsonResponse
    {
        return response()->json(['status' => 'success'], 200);
    }
}
