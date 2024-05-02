<?php

namespace App\Http\Controllers;

use App\Contracts\Booking\IndexBookingActionContract;
use App\Contracts\Booking\StoreBookingActionContract;
use App\Contracts\Booking\ShowBookingActionContract;
use App\Contracts\Booking\UpdateBookingActionContract;
use App\Contracts\Booking\DestroyBookingActionContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $indexBookingAction;
    protected $storeBookingAction;
    protected $showBookingAction;
    protected $updateBookingAction;
    protected $destroyBookingAction;

    public function __construct(
        IndexBookingActionContract $indexBookingAction,
        StoreBookingActionContract $storeBookingAction,
        ShowBookingActionContract $showBookingAction,
        UpdateBookingActionContract $updateBookingAction,
        DestroyBookingActionContract $destroyBookingAction
    )
    {
        $this->indexBookingAction = $indexBookingAction;
        $this->storeBookingAction = $storeBookingAction;
        $this->showBookingAction = $showBookingAction;
        $this->updateBookingAction = $updateBookingAction;
        $this->destroyBookingAction = $destroyBookingAction;
    }

    public function index(): JsonResponse
    {
        return $this->indexBookingAction->index();
    }

    public function store(Request $request): JsonResponse
    {
        return $this->storeBookingAction->store($request);
    }

    public function show($id): JsonResponse
    {
        return $this->showBookingAction->show($id);
    }

    public function update(Request $request, $id): JsonResponse
    {
        return $this->updateBookingAction->update($request, $id);
    }

    public function destroy($id): JsonResponse
    {
        return $this->destroyBookingAction->destroy($id);
    }
}

