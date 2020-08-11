<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Book;

class UnreturnedBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:unreturned';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display users that have books borrowed';

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

        foreach ($unreturnedBooks as $unreturnedBook) {
            $borrowingDate = $unreturnedBook->currentBorrowing->first()->borrowing_date;
            $maxReturnedDate = date('Y-m-d', strtotime($borrowingDate . ' + 28 days'));
            if (date('Y-m-d') <= $maxReturnedDate) {
                $this->info($unreturnedBook->currentUser->first()->name
                    . ' must return "'
                    . $unreturnedBook->title
                    . '" on '
                    . $maxReturnedDate);
            } else {
                $this->warn($unreturnedBook->currentUser->first()->name
                    . ' passed the returning date ('
                    . $maxReturnedDate
                    . ') for "'
                    . $unreturnedBook->title
                    . '"');
            }
        }
    }
}
