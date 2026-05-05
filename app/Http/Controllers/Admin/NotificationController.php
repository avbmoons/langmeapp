<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::latest()->paginate(10);

        return view('admin.notifications.index', compact('notifications'));
    }

    public function marcAsRead(string $id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        $notification->markAsRead();
        return redirect()->back();
    }
}
