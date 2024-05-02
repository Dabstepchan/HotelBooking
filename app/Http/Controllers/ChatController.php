<?php

namespace App\Http\Controllers;

use App\Actions\Chat\IndexChatAction;
use App\Actions\Chat\MessagesChatAction;
use App\Actions\Chat\SendChatAction;
use App\Http\Requests\MessageFormRequest;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    public function index(): JsonResponse
    {
        $action = new IndexChatAction();
        return $action();
    }

    public function messages(): JsonResponse
    {
        $action = new MessagesChatAction();
        return $action();
    }

    public function send(MessageFormRequest $request): JsonResponse
    {
        $action = new SendChatAction($request);
        return $action();
    }
}
