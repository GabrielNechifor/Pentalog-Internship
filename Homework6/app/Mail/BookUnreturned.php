<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Book;

class BookUnreturned extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $unreturnedBook)
    {
        $this->unreturnedBook = $unreturnedBook;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.book.unreturned')
                    ->with([
                        'title' => 'Book unreturned',
                        'bodyMessage' => 'You have passed the returning date for '
                            . $this->unreturnedBook->fullTitle
                            . '. Please return the book.',
                    ]);
    }
}
