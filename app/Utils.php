<?php
Namespace App;
use App\Models\Passenger;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\Bus;
use DB;

class Utils {


    static function returnVacancies($di)
    {

        $board = DB::table('passageiro')->where('id', $di)->select('POLTRONA')->get();
        
        foreach ($board as $b)
        {
            return $b->POLTRONA;
        }
         
        
    }

    public function updateVacancie($id)
    {
        
        $Trip = new Trip();
        $trip = $Trip->find($id);
        $vagas = $trip->VAGAS;
        
        if($vagas > 0){
            $trip->VAGAS =  $vagas - 1;
            $trip->save();
            return 'ok';
        }
        else 
            return 'limit';
    }

    public function removeVacancie($id)
    {
        $Trip = new Trip();
        $trip = $Trip->find($id);
        $vagas = $trip->VAGAS;

        $trip->VAGAS = $vagas + 1;
        $trip->save();
    }

    static function returnBoards($id)
    {
        
        $boards = DB::table('passageiro')->where('CODVIAGEM', $id)->select('POLTRONA')->get();
        $arrBoard = array();
        $arr = [1, 2, 3 , 4, 5, 6, 7, 8, 9, 10,
                11, 12, 13 , 14, 15, 16, 17, 18, 19, 20,
                21, 22, 23 , 24, 25, 26, 27, 28, 29, 30,
                31, 32, 33 , 34, 35, 36, 37, 38, 39, 40,
                41, 42, 43 , 44, 45, 46
        ];

        foreach($boards as $board) {
            array_push($arrBoard, $board->POLTRONA);
        }

        $result = array_diff($arr, $arrBoard);
    
        return $result;

        
    }

    static function returnDrivers() {
        $drivers = new Driver();

        return $drivers::all();

    }

    static function returnBus() {
        $bus = new Bus();

        return  $bus::all();

    }

    static function returnTripData($id) {
        $tripData = new Trip();

        return $tripData->find($id);
    }

    static function returnPassengerData($id) {
        $passengerData = new Passenger();

        return $passengerData->find($id);
    }

    
}

?>