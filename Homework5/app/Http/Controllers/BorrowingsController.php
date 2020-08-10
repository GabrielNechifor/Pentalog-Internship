<?php

namespace App\Http\Controllers;

use App\Borrowing;
use App\Book;
use App\User;
use App\Http\Requests\StoreBorrowingPost;
use App\Http\Requests\UpdateBorrowingPut;

class BorrowingsController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('book', 'user')->get();

        return view('borrowings/index', ['borrowings' => $borrowings]);
    }

    public function show($id)
    {
        $borrowing = Borrowing::with('book', 'user')->whereId($id)->first();
        return view('borrowings/show', ['borrowing' => $borrowing]);
    }

    public function create()
    {
        $books = Book::unborrowedBooks()->pluck('fullTitle');
        $users = User::all()->pluck('name');
        return view('borrowings/create', [
            'books' => $books,
            'users' => $users
        ]);
    }

    public function store(StoreBorrowingPost $request)
    {
        $book = Book::get()->filter(function($item) use ($request) {
            return $item->fullTitle == $request->input('book_title');
        });
        $user = User::whereName($request->input('user_name'))->first();

        Borrowing::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'borrowing_date' => $request->input('borrowing_date') ?? NOW(),
            'returning_date' => $request->input('returning_date')
        ]);

        return redirect("/borrowings");
    }

    public function edit($id)
    {
        $borrowing = Borrowing::with('book', 'user')->whereId($id)->first();
        $books = Book::unborrowedBooks()->pluck('fullTitle');
        $users = User::all()->pluck('name');

        return view('borrowings/edit', [
            'borrowing' => $borrowing,
            'books' => $books,
            'users' => $users
        ]);
    }


    public function update(UpdateBorrowingPut $request)
    {
        $book = Book::get()->filter(function($item) use ($request) {
            return $item->fullTitle == $request->input('book_title');
        })->first();
        $user = User::whereName($request->input('user_name'))->first();

        $borrowing = Borrowing::whereId($request->input('id'));
        $borrowing->update([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'borrowing_date' => $request->input('borrowing_date'),
            'returning_date' => $request->input('returning_date')
        ]);

        return redirect("/borrowings");
    }

    public function delete($id)
    {
        $borrowing = Borrowing::whereId($id)->first();
        $borrowing->delete();

        return redirect("/borrowings");
    }
}
