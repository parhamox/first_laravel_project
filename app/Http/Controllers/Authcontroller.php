<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Mail;

class Authcontroller extends Controller
{
         public function register(){


             return view("auth.register");

    }

    public function store() {






        $validated = Request()->validate(

        [
            'name'     => 'required | min:3 |max:40',
            'email'    => 'required |email|unique :users,email',
            'password' => 'required |confirmed'

        ]
        );

       $user = User::create(
            [
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash ::make($validated['password']),
            ]
            );

            Mail::to($user-> email )
            -> send(new WelcomeEmail($user));
            return redirect()->route('dashboard')->  with('Success'  , 'youre  registred ');



}
// for log in authenticate ...............................................

public function login(){


    return view("auth.login");

}

public function authenticate() {





$validated = Request()->validate(

[

   'email'    => 'required |email',
   'password' => 'required'

]
);
     if (auth ()->attempt( $validated )){

        request()->session()->regenerate();

        return redirect()->route('dashboard')->  with('Success'  , 'you are logged in');

     };

   return redirect()->route ('login')->withErrors
   (
    [

        'email' => 'invalid email or password'

    ]
   );

}


    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->route('dashboard')->  with('Success'  , 'youre  loged out pearson ');
    }





    }
