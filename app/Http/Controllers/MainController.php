<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $cars = Car::where('is_busy', 0)->get();

        return view('/index', compact('cars'));
    }


    public function login()
    {
        return view('/login');
    }


    public function register()
    {
        return view('/register');
    }


    public function login_process(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required'
        ]);

        if(@auth('web')->attempt($data))
        {
            return redirect()->route('main');
        }

        return redirect()->route('login')->withErrors(['name' => 'Enter the name correctly!']);
    }


    public function register_process(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|confirmed'
        ]); 

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if($user)
        {
            auth('web')->login($user);
        }

        return redirect()->route('main', compact('user'));
    }


    public function logout()
    {
        auth('web')->logout();

        return redirect()->route('main');
    }
}