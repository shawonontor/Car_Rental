<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CarController extends Controller
{
    //
   public function CarDetails(Request $request)
   {

     $id = $request->id;
     $carsDetails = car::findOrFail($id);
    return Inertia::render('CustomerCarpage/Cardetails',[
        'carsdata' => $carsDetails,
        'carId' => $id
    ]);
   }

   public function CarFeature()
   {
     $cars = car::all();

     return Inertia::render('CustomerCarpage/CarFeature',[
        'cars' => $cars
     ]);
   }

}
