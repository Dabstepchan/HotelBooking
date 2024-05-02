<?php

namespace App\Actions\Chat;

use App\Contracts\Chat\SendChatActionContract;
use App\Events\MessageSent;
use App\Http\Requests\MessageFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class SendChatAction implements SendChatActionContract
{
    protected $request;

    public function __construct(MessageFormRequest $request)
    {
        $this->request = $request;
    }

    public function __invoke(): JsonResponse
    {
        $user = $this->request->user() ?? User::find(1);
        $message = $user->messages()->create($this->request->validated());
        broadcast(new MessageSent($user, $message));
        return response()->json(['message' => $message], 201);
    }
}
