<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Trip;
use App\User;
use App\Format;

class HomeController extends Controller
{
    private $PassengerModel;
    private $Trip;
    private $format;
    private $validate;
    private $Utils;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Passenger $passenger, Trip $trip, Format $format)
    {
        $this->middleware('auth');

        $this->PassengerModel = $passenger;
        $this->Trip = $trip;
        $this->format = $format;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home');
    }

    public function register()
    {


        return view('vendor.adminlte.register');
    }


    static public function countTrip() {

        $trip = new Trip();
        $trip->all(); 
        
        $count = $trip->count(); 

        return $count;
        
    }

    static public function countPassenger() {

        $passenger = new Passenger();
        $passenger->all(); 
        
        $count = $passenger->count(); 

        return $count;
        
    }

    static public function countUser() {

        $user = new User();
        $user->all(); 
        
        $count = $user->count(); 

        return $count;
        
    }

}
