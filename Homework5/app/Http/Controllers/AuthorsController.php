<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorPost;
use App\Http\Requests\UpdateAuthorPut;
use App\Author;
use Illuminate\Support\Facades\Storage;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors/index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $author = Author::with('books', 'publishers')->whereId($id)->first();
        return view('authors/show', [
            'author' => $author
        ]);
    }

    public function create()
    {
        return view('authors/create');
    }

    public function store(StoreAuthorPost $request)
    {
        $path = Storage::disk('public')->put('authors', $request->file('image'));

        Author::create([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'country' => $request->input('country'),
            'birth_date' => $request->input('birth_date'),
            'death_date' => $request->input('death_date'),
            'image_url' => $path
        ]);

        return redirect("/authors");
    }

    public function edit($id)
    {
        $author = Author::whereId($id)->first();

        return view('authors/edit', [
            'author' => $author
        ]);
    }


    public function update(UpdateAuthorPut $request)
    {
        $author = Author::whereId($request->input('id'))->first();

        if ($request->file('image') != null) {
            Storage::disk('public')->delete($author->image_url);
            $path = Storage::disk('public')->put('authors', $request->file('image'));
        } else {
            $path = $author->image_url;
        }

        $author->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'country' => $request->input('country'),
            'birth_date' => $request->input('birth_date'),
            'death_date' => $request->input('death_date'),
            'image_url' => $path
        ]);

        return redirect("/authors");
    }

    public function delete($id)
    {

        $author = Author::whereId($id)->first();
        $author->delete();

        return redirect("/authors");
    }
}
