<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    public function create(){
        return view('cars.create');
    }

    public function store(Request $request){
        $data = $request -> validate([
            'number' => 'string',
            'mark' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
        ]);

        Car::create([
            'number' => $data['number'],
            'mark' => $data['mark'],
            'model' => $data['model'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('car.index');
    }
}
