<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();

        return view('cars.index', ['cars']);
    }

    public function create(){
        return view('cars.create');
    }

    public function store(Request $request){
        $request -> validate([
            'number' => ['required', 'string', 'max:255'],
            'mark' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
        ]);

        Car::create([
            'number' => $request->number,
            'mark' => $request->mark,
            'model' => $request->model,
        ]);

        return Redirect::route('profile.edit');
    }
}
