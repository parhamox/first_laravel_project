<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class dashboardcontroler extends Controller
{
  public function index ()
  {


    $ideas = Idea :: with('user:id,name,image' , 'comments.user:id,name,image')-> orderBy ("created_at","desc");
    if (request()->has('search')) {

        $ideas = $ideas -> where ("content" , 'like' ,'%' . request()->get('search' , '') . '%');


    }


    return view('dashboard',
    [
    'ideas' => $ideas-> paginate (5)
    ]);


  }

}
