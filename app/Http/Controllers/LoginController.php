<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function loginpage() {
        return view('login');
    }

    public function registerpage() {
        return view('register',['success' => 'false']);
    }

    public function login(Request $r){
      $this->validate($r,[
        'username' => 'required',
        'password' => 'required'
      ]);

      if(Auth::attempt(['username' => $r->username, 'password' => $r->password]) || Auth::attempt(['email' => $r->username, 'password' => $r->password])){
        return redirect()->intended('/');
      }else{
        return redirect()->back()->with('loginerror','Invalid username or password!');
      }

    }

    public function register(Request $r){
      $this->validate($r,[
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|unique:users,username|min:6',
        'password' => 'required|alpha_num|min:6'
      ]);

      User::create([
        'fname' => $r->fname,
        'lname' => $r->lname,
        'email' => $r->email,
        'username' => $r->username,
        'password' => bcrypt($r->password)
      ]);

      return view('register',['success' => 'true']);
    }

    public function signout(){
      Auth::logout();
      return redirect('/');
    }
}
