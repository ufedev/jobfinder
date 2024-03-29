<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke(Request $request): View
    {
        //
        $this->authorize('isRecluiter', Jobs::class);
        $notifications = auth()->user()->unreadNotifications;

        $notifications->markAsRead();


        return view("notification.new_candidate", [
            'notifications' => $notifications ?? []
        ]);
    }
}
