<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherPost;
use App\Http\Requests\UpdatePublisherPut;
use App\Publisher;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        return view('publishers/index', ['publishers' => $publishers]);
    }

    public function show($id)
    {
        $publisher = Publisher::with('books', 'authors')->whereId($id)->first();
        return view('publishers/show', [
            'publisher' => $publisher
        ]);
    }

    public function create()
    {
        return view('publishers/create');
    }

    public function store(StorePublisherPost $request)
    {
        Publisher::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'origin_country' => $request->input('country'),
            'location' => $request->input('location'),
            'website' => $request->input('website')
        ]);

        return redirect("/publishers");
    }

    public function edit($id)
    {
        $publisher = Publisher::whereId($id)->first();

        return view('publishers/edit', [
            'publisher' => $publisher
        ]);
    }


    public function update(UpdatePublisherPut $request)
    {
        $publisher = Publisher::whereId($request->input('id'));
        $publisher->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'origin_country' => $request->input('country'),
            'location' => $request->input('location'),
            'website' => $request->input('website')
        ]);

        return redirect("/publishers");
    }

    public function delete($id)
    {
        $publisher = Publisher::whereId($id)->first();
        $publisher->delete();

        return redirect("/publishers");
    }
}
