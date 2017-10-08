<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Topic;

class HomepageController extends Controller
{
    public function __invoke() {
      if(Auth::check()){
        $topic = Topic::get();

        return view('homepage')->with(compact('topic'));
      }else{
        return redirect('/loginpage');
      }
    }
}
