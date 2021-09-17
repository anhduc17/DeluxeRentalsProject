<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function CarIndex(){
        $carlist = car::all();
        return view ('car.index',compact('carlist'));
    }

    public function CreateCar(){
        return view ('car.create');
    }

    public function StoreCar(Request $request){

        $car = new car;
        $car->CarBrand = $request->input('txtBrand');
        $car->CarModel = $request->input('txtModel');
        $car->CarPlate = $request->input('txtPlate');
        $car->CarPrice = $request->input('txtPrice');
        if($request->hasfile('CarPic')){  
            $file = $request->file('CarPic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/carlist/', $filename);  
            $car->CarPic = $filename;
        }
        $car->save();
        
        return redirect()->back()->with('status','Car added successfully');
    }


    public function EditCar($id){
        $carlist = car::find($id);
        return view('car.edit',compact('carlist')); 
    }

    public function UpdateCar(Request $request, $id){
        $carlist = car::find($id);
        $carlist->CarBrand = $request->input('txtBrand');
        $carlist->CarModel = $request->input('txtModel');
        $carlist->CarPlate = $request->input('txtPlate');
        $carlist->CarPrice = $request->input('txtPrice');
        if($request->hasfile('CarPic')){  
            $destination = 'uploads/carlist/'.$carlist->CarPic;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('CarPic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/carlist/', $filename);  
            $carlist->CarPic = $filename;
        }
        $carlist->update();
        
        return redirect()->back()->with('status','Car updated successfully');
        
    }


    public function DeleteCar($id){
        $car = car::find($id);
        $destination = 'uploads/carlist/'.$car->CarPic;
        if(File::exists($destination)){
             File::delete($destination);
        }
        $car->delete();

        return redirect()->back()->with('status','Car deleted successfully');
    }
}
