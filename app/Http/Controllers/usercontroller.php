<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class usercontroller extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show (User $user)

    {



        return view('users.show', compact ('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;

        return view('users.edit', compact ('user' , 'editing' ,));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)

    {



        $validated = request()->validate(

            [
                'name' =>'required|min:3|max:40',
                'bio' => 'nullable|min:1|max:255',
                'image' =>'image'
            ]
        );

        if(request()->has('image'))
        {
            $imagePath= request()->file('image')->store('profile' , 'public');
            $validated['image']=$imagePath;


            Storage::disk('public')->delete($user->image ?? '');

        }




        $user-> update($validated);
        return redirect()->route('profile', $user->id);
    }

    public function profile()
    {
        return $this->show(Auth()->user());
    }


}
