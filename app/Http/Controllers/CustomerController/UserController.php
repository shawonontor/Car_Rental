<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\car;
use App\Models\rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    //
    public function ProfileCreate(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required|in:admin,customer'
            ]);

            User::create([

                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role
            ]);

            return redirect()->route('login.page')->with('success', 'profile created successfully');
        } catch (\Throwable $th) {
            //throw $th
            return $th->getMessage();
        }
    }

    public function Login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);



            $email = $request->email;
            $password = $request->password;

            $user = User::all();


            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                $count = User::where('email', $email)->where('role', 'admin')->count();
                if ($count === 1) {
                    return redirect()->route(route: 'admin.dash')->with('success', 'log in success');
                } else {
                    return redirect()->route(route: 'user.homePage')->with('success', 'log in success');

                }

            } else {
                return "sorry";
            }


        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function UserHomepage()
    {
        $cars = car::all();

        $user = Auth::user();
        return Inertia::render('CustomerCarpage/UserHomapage', [
            'cars' => $cars,
            'user' => $user
        ]);
    }

    public function UserdashPage()
    {


        $userId = auth()->id();

        $carCount = car::where('availability', '1')->count();
        $Totalcar = car::whereBetween('availability', [0, 1])->count();

        $users = User::findOrFail($userId);
        return Inertia::render('CustomerCarpage/Customerdashpage', [
            'users' => $users,
            'availablecar' => $carCount,
            'Totalcar' => $Totalcar
        ]);
    }

    public function UserRental(Request $request)
    {
        


       

       $userId = auth()->id();
        $users = User::findOrFail($userId);

        

        return Inertia::render('CustomerCarpage/UserRentallist', [
            'users'=> $users,
           
        ]);

    }

    public function carbooking(Request $request)
    {
        try {
            $request->validate([
                'start_date' => 'required',
                'end_date' => 'required',
                'car_id' => 'required',
                'car_rent' => 'required'
            ]);
            $userId = auth()->id();
            $tc = 120;

            rental::create([
                'user_id' => $userId,
                'car_id' => $request->car_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_cost' => $tc
            ]);


        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
