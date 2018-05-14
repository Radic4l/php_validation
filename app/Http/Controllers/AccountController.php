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
    public function edit(Request $request)
    {
        $user = Auth::user();
        $user -> firstname = $request -> firstname;
        $user -> lasttname = $request -> lastname;
        $user -> email = $request -> email;
        $user -> firstname = $request -> firstname;

        return view('edit');
    }

}
