<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function store(){

        $validated =request()->validate([

            'content' =>'required|min:5|max:240'

        ]);


        $validated ['user_id']= auth()->id();


         Idea::create ($validated);

       return redirect()->route('dashboard')->  with('Success'  , 'youre idea successfully uploaded ');

    }

    public function show (Idea $idea){



            return view('ideas.show',compact('idea'));
    }


        public function destroy (Idea $idea){

        if (auth()->id() !== $idea->user_id){
            abort(404);
        }


            $idea->delete();

            return redirect()->route('dashboard')->  with('Success'  , 'youre idea deleted ');
        }


    public function edit (Idea $idea){

        if (auth()->id() !== $idea->user_id){
            abort(404 );
        }



        $editing =true;
        return view('ideas.show',compact('idea' , 'editing'));
    }
    public function update (Idea $idea){

        if (auth()->id() !== $idea->user_id){
            abort(404);
        }

        request()->validate([
            'content' =>'required|min:5|max:240'


        ]);
        $idea->content = request()->get('content','');
        $idea->save();

        return redirect()->route('ideas.show' , $idea ->id) -> with('Success' , ' idea updated successfully');
    }



}
