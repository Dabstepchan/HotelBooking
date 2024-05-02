<?php

namespace App\Contracts\Chat;

use Illuminate\Http\JsonResponse;

interface ChatActionContract
{
    public function __invoke(): JsonResponse;
}
