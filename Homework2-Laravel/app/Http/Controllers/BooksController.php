<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Author;
use App\Publisher;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('index', ['books' => $books]);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        if (
            isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['publisher']) && !empty($_POST['publisher']) &&
            isset($_POST['year']) && !empty($_POST['year']) && strlen((string)$_POST['year']) == 4
        ) {
            $author = Author::firstOrCreate(
                ['name' => $_POST['author']]
            );

            $publisher = Publisher::firstOrCreate(
                ['name' => $_POST['publisher']]
            );

            $book = new Book;
            $book->create([
                'title' => $_POST['title'],
                'author_id' => $author->id,
                'publisher_id' => $publisher->id,
                'publish_year' => $_POST['year'],
                'created_at' => NOW()
            ]);

            return redirect("/");
        }
    }

    public function edit()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $book = Book::whereId($_GET['id'])->first();

            return view('edit', ['book' => $book]);
        }
    }


    public function update()
    {

        if (
            isset($_POST['id']) &&  !empty($_POST['id']) &&
            isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['publisher']) && !empty($_POST['publisher']) &&
            isset($_POST['year']) && !empty($_POST['year']) && strlen((string)$_POST['year']) == 4
        ) {
            $author = Author::firstOrCreate([
                'name' => $_POST['author']
            ]);

            $publisher = Publisher::firstOrCreate([
                'name' => $_POST['publisher']
            ]);

            $book = Book::whereId($_POST['id']);

            $lastAuthor = $book->first()->author;
            $lastPublisher = $book->first()->publisher;

            $book->update([
                'title' => $_POST['title'],
                'author_id' => $author->id,
                'publisher_id' => $publisher->id,
                'publish_year' => $_POST['year'],
                'updated_at' => NOW()
            ]);

            $countBookByAuthorId = Book::whereAuthorId($lastAuthor->id)->count();
            if ($countBookByAuthorId == 0) {
                $lastAuthor->delete();
            }

            $countBooksByPublisherId = Book::wherePublisherId($lastPublisher->id)->count();
            if ($countBooksByPublisherId == 0) {
                $lastPublisher->delete();
            }

            return redirect("/");
        }
    }

    public function delete()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $book = Book::whereId($_GET['id'])->first();
            $author = $book->author;
            $publisher = $book->publisher;

            $book->delete();

            $countBookByAuthorId = Book::whereAuthorId($author->id)->count();
            if ($countBookByAuthorId == 0) {
                $author->delete();
            }

            $countBooksByPublisherId = Book::wherePublisherId($publisher->id)->count();
            if ($countBooksByPublisherId == 0) {
                $publisher->delete();
            }

            return redirect("/");
        }
    }
}
