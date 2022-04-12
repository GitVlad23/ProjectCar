<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    public function drive($carID)
    {
        $car = Car::find($carID);
        $user = User::class; 
        
        if($car->is_busy == 0 && @auth('web')->user())
        {
            $user = auth('web')->user()->id;

            $car->user_id = $user;
            $car->is_busy = 1;
            $car->save();

            $user = auth()->user();
            $user->car_id = $carID;
            $user->is_driving = 1;
            $user->save();

            return view('/card', compact('car'));
        }

        if(@auth('web')->user())
        {
            session()->flash('busy', 'The car you are trying to take a drive is busy now!');
        } else
        {
            session()->flash('register', 'You must be authorised to take a drive!');
        }

        return redirect()->route('main');
    }


    public function exit($carID)
    {
        $car = Car::find($carID);
            
        $car->user_id = 0;
        $car->is_busy = 0;
        $car->save();

        $user = auth()->user();
        $user->car_id = 0;
        $user->is_driving = 0;
        $user->save();

        return redirect()->route('main');
    }
}
