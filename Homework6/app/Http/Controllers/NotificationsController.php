<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class NotificationsController extends Controller
{
    public function showAll()
    {
        if (Auth::guard('user')->check()) {
            $unseenNotifications = Notification::whereUserId(Auth::guard('user')->user()->id)
                ->unseen()
                ->orderBy('created_at', 'desc')
                ->get();

            $seenNotifications = Notification::whereUserId(Auth::guard('user')->user()->id)
                ->seen()
                ->orderBy('created_at', 'desc')
                ->get();

            Notification::whereUserId(Auth::guard('user')->user()->id)
                ->unseen()
                ->allSeen();

            return view('notifications/index', [
                'unseenNotifications' => $unseenNotifications,
                'seenNotifications' => $seenNotifications
            ]);
        } elseif (Auth::guard('admin')->check()) {
            $unseenNotifications = Notification::whereAdminId(Auth::guard('admin')->user()->id)
                ->unseen()
                ->get();

            $seenNotifications = Notification::whereAdminId(Auth::guard('admin')->user()->id)
                ->seen()
                ->get();

            Notification::whereAdminId(Auth::guard('admin')->user()->id)
                ->unseen()
                ->allSeen();

            return view('notifications/index', [
                'unseenNotifications' => $unseenNotifications,
                'seenNotifications' => $seenNotifications
            ]);
        }

        return view('/');
    }
}
