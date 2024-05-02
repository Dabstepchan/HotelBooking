<?php

namespace App\Providers;

use App\Contracts\Chat\IndexChatActionContract;
use App\Contracts\Chat\MessagesChatActionContract;
use App\Contracts\Chat\SendChatActionContract;
use App\Actions\Chat\IndexChatAction;
use App\Actions\Chat\MessagesChatAction;
use App\Actions\Chat\SendChatAction;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        IndexChatActionContract::class => IndexChatAction::class,
        MessagesChatActionContract::class => MessagesChatAction::class,
        SendChatActionContract::class => SendChatAction::class,
        IndexBookingActionContract::class => IndexBookingAction::class,
        StoreBookingActionContract::class => StoreBookingAction::class,
        ShowBookingActionContract::class => ShowBookingAction::class,
        UpdateBookingActionContract::class => UpdateBookingAction::class,
        DestroyBookingActionContract::class => DestroyBookingAction::class,
    ];
}
