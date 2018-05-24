<?php

namespace App\Http\Controllers;
use App\User;
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

    public function showUsers()
    {
        $users = Auth::user()->all();
        //$data = ['projects' => $projects];
        //$users->except(['password']);
        //dump($users); die;
        $data = [
          'user' => $users
        ];

        return view ('admin.index')->with('users', $users);
    }
    public function showProfile($id)
    {
        $profile = User::find($id);

        $data = [
            'profile' => $profile,
        ];
        return view('admin.showProfile', $data);
    }
}
