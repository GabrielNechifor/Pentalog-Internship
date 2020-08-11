<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('user');
    }

    public function index()
    {
        $users = User::all();

        return view('users/index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::with('books')->whereId($id)->first();
        return view('users/show', ['user' => $user]);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store(StoreUserPost $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'gender' => $request->input('gender'),
            'birth_date' => $request->input('birth_date'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number')
        ]);

        return redirect("/users");
    }

    public function edit($id)
    {
        $user = User::whereId($id)->first();

        return view('users/edit', [
            'user' => $user
        ]);
    }


    public function update(UpdateUserPut $request)
    {
        $user = User::whereId($request->input('id'));

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'gender' => $request->input('gender'),
            'birth_date' => $request->input('birth_date'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number')
        ]);

        return redirect("/users");
    }

    public function delete($id)
    {
        $user = User::whereId($id)->first();
        $user->delete();

        return redirect("/users");
    }
}
