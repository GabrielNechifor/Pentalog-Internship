<?php

namespace App\Listeners;

use App\Events\BookBorrowed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notification;
use App\Admin;

class SendNotificationBookBorrowed
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BookBorrowed  $event
     * @return void
     */
    public function handle(BookBorrowed $event)
    {
        Notification::create([
            'name' => 'Book borrowed',
            'message' => 'You have borrowed ' . $event->borrowing->book->fullTitle,
            'seen' => false,
            'user_id' => $event->borrowing->user_id,
        ]);

        $adminsId = Admin::all()->pluck('id');
        foreach ($adminsId as $adminId){
            Notification::create([
                'name' => 'Book borrowed',
                'message' => $event->borrowing->user->name
                    . ' (ID: ' . $event->borrowing->user_id
                    . ') have borrowed '
                    . $event->borrowing->book->fullTitle,
                'seen' => false,
                'admin_id' => $adminId,
            ]);
        }
    }
}
