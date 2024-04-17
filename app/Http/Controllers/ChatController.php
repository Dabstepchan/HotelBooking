<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['status' => 'success'], 200);
    }

    public function messages(): JsonResponse
    {
        $messages = Message::query()->with('user')->get();
        return response()->json(['messages' => $messages], 200);
    }

    public function send(MessageFormRequest $request): JsonResponse
    {
        $message = $request->user()->messages()->create($request->validated());

        broadcast(new MessageSent($request->user(), $message));

        return response()->json(['message' => $message], 201);
    }
}
