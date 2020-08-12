<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Book;
use App\Notification;
use App\Admin;
use App\Mail\BookUnreturned;
use Illuminate\Support\Facades\Mail;

class NotifyUsersForLateReturns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notifyLateReturn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users by notification and email when they are late to return a book they borrowed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $unreturnedBooks = Book::with('users', 'currentBorrowing')->unreturnedBooks()->get();
        $adminsId = Admin::all()->pluck('id');

        foreach ($unreturnedBooks as $unreturnedBook) {
            $borrowingDate = $unreturnedBook->currentBorrowing->first()->borrowing_date;
            $maxReturnedDate = date('Y-m-d', strtotime($borrowingDate . ' + 28 days'));
            if (date('Y-m-d') <= $maxReturnedDate) {
                Notification::create([
                    'name' => 'Book unreturned',
                    'message' => 'You must return ' . $unreturnedBook->fullTitle,
                    'seen' => false,
                    'user_id' => $unreturnedBook->currentUser->first()->id,
                ]);

                foreach ($adminsId as $adminId) {
                    Notification::create([
                        'name' => 'Book unreturned',
                        'message' => $unreturnedBook->currentUser->first()->name . ' didn\'t return ' . $unreturnedBook->fullTitle,
                        'seen' => false,
                        'admin_id' => $adminId,
                    ]);
                }

                Mail::to($unreturnedBook->currentUser->first()->email)->send(new BookUnreturned($unreturnedBook));
            }
        }
        $this->info('Done!');
    }
}
