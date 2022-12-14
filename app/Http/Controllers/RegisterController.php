<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'name'=>'required|max:255|min:3',
            'username'=>'required|max:255',
            'email'=>['required','email'],
            'password'=>'required'
        ]);


        $user = User::create($attributes);

        // logging in the given user
        auth()->login($user);

        return redirect('/')->with('success','Your account has been created');
    }

}
