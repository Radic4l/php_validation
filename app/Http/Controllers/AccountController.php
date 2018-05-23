<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('home');
    }



    public function edit ()
    {
        return view ('update');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user -> firstname = $request -> firstname;
        $user -> lastname = $request -> lastname;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> save();

        return redirect(route('index.project'))->with('success', 'Your profile was updated');
    }

}
