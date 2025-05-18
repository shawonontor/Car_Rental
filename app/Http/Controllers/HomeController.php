<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    
    public function Homepage()
    {   

        $cars = car::all();
        return Inertia::render('Auth/HomePage',[
            'cars' => $cars
        ]);
    }
    public function Registrationpage()
    {   

        
        return Inertia::render('Auth/RegistrationPage');
    }
    public function Loginpage()
    {   

        
        return Inertia::render('Auth/LoginPage');
    }
    
}
