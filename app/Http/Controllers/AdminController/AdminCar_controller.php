<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AdminCar_controller extends Controller 
{
    //
    public function Car_create_page()
    {  
        // return "hello";
        return Inertia::render('AdminCarepage/AddCar');
    }

    public function Car_store(Request $request)
    {
        try {



             $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'year' => 'required|integer|digits:4',
                'car_type' => 'required|string|max:255',
                'daily_rent_price' => 'required|numeric|min:0',
                'availability' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);  

            $imageLocation = '';

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('image', $imageName, 'sharedcar');
                $imageLocation = Storage::disk('sharedcar')->url($imagePath);
            }
    
            car::create([
                'name' => $request->name,
                'brand' =>$request->brand,
                'model' => $request->model,
                'year' => $request->year,
                'car_type' => $request->car_type,
                'daily_rent_price'=> $request->daily_rent_price,
                'availability'=> $request->availability,
                'image' => $imageLocation
            ]);

            return redirect()->route('login.page')->with('success','car add successfully');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function admin_carpage()
    {  

        $cars = car::all();
      return Inertia::render('AdminCarepage/AdminCar_details',[
        'cars' => $cars
      ]);
    }

    public function Admindashboard()
    {   
        $carCount = car::where('availability','1')->count();

        $userId = auth()->id();

        $users = User::findOrFail($userId);

        return Inertia::render('AdminCarepage/Admin_dashboard',[
            'availableCar'=> $carCount,
            'users' => $users

        ]);
    }

}
