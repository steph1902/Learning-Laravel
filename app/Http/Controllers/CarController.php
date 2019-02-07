<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{




    //iindex page
    public function index()
    {
        $cars = Car::all();
        return view('carindex',compact('cars'));
    }

    //insert data page
    public function create()
    {
        return view('carcreate');
    }

    //go to update page
    public function edit($id)
    {
        $car = Car::find($id);
        return view('caredit',compact('car','id'));
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('car')->with('success','Car has been deleted');
    }


    //update data page
    public function update(Request $request,$id)
    {
        $car = Car::find($id);
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');
        $car->save();

        return redirect('car')->with('success','Car has been successfully updated');
    }



    public function store(Request $request)
    {
        $car = new Car();
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');


        $validatedData = $request->validate
        (
            [
                'carcompany'=>'required',
                'model'=>'required',
                'price'=>'number'
            ]
        );


        $car->save();

        return redirect('car')->with('Success','Car has been successfully added');


    }
}
