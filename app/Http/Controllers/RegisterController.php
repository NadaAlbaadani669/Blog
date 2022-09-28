<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => ['required','min:3','max:255',Rule::unique('users','name')],
            'email' => ['required','min:3','max:255',Rule::unique('users','email')],
            'password' => ['required','min:7','max:255'],
        ]);


        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your Account Has Been Created.');


    }
}
