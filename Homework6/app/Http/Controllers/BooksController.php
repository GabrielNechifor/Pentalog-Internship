<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookPost;
use App\Http\Requests\UpdateBookPut;
use App\Book;
use App\Author;
use App\Publisher;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'publisher')->get();

        return view('books/index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::with('author', 'publisher', 'users')->whereId($id)->first();
        return view('books/show', ['book' => $book]);
    }

    public function create()
    {
        $authors = Author::all()->pluck('name');
        $publishers = Publisher::all()->pluck('name');

        return view('books/create', [
            'authors' => $authors,
            'publishers' => $publishers
        ]);
    }

    public function store(StoreBookPost $request)
    {
        $path = Storage::disk('public')->put('books', $request->file('image'));

        $author = Author::whereName($request->input('author_name'))->first();

        $publisher = Publisher::whereName($request->input('publisher_name'))->first();

        Book::create([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'volume' => $request->input('volume'),
            'copies_number' => $request->input('copies'),
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
            'publish_year' => $request->input('publish_year'),
            'cover_link' => $path
        ]);

        return redirect("/books");
    }

    public function edit($id)
    {
        $book = Book::with('author', 'publisher')->whereId($id)->first();
        $authors = Author::all()->pluck('name');
        $publishers = Publisher::all()->pluck('name');

        return view('books/edit', [
            'book' => $book,
            'authors' => $authors,
            'publishers' => $publishers
        ]);
    }


    public function update(UpdateBookPut $request)
    {
        $author = Author::whereName($request->input('author_name'))->first();
        $publisher = Publisher::whereName($request->input('publisher_name'))->first();

        $book = Book::whereId($request->input('id'));
        if ($request->file('image') != null) {
            $path = Storage::disk('public')->put('books', $request->file('image'));
            Storage::disk('public')->delete($book->first()->cover_link);
        } else {
            $path = $book->first()->cover_link;
        }

        $book->update([
            'title' => $request->input('title'),
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
            'publish_year' => $request->input('publish_year'),
            'cover_link' => $path
        ]);

        return redirect("/books");
    }

    public function delete($id)
    {
        $book = Book::whereId($id)->first();
        $book->delete();

        return redirect("/books");
    }
}
