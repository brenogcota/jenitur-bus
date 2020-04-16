<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Trip;
use App\Format;
use App\Validate;
use DB;
use PDF;

class RecordController extends Controller
{
    
    private $tripModel;
    private $passengerModel;
    private $format;
    private $validate;

    public function __construct(Passenger $passenger, Trip $trip, Format $format, Validate $validate)
    {
        
        $this->tripModel = $trip;
        $this->passengerModel = $passenger;
        $this->format = $format;
        $this->validate = $validate;

    }

    public function index()
    {
        $trip = $this->tripModel->orderBy('DATA', 'DESC')->limit(10)->get();
        foreach($trip as $t){
            $format = $this->format;
            $date = $format->formatDate($t->DATA);
            $hour = $format->formatHour($t->HORARIO);
            $t->DATA = $date;
            $t->HORARIO = $hour;    
        }
        
        return view('pages.relatorio')->with(compact('trip'));
    }

    public function generatePDF()
    {
        $trip = $this->tripModel->all();
    
        return \PDF::loadView('relatorio-pdf', compact('trip'))
                    ->setPaper('a4', 'landscape')
                    ->stream('relatorio-de-viagens.pdf');
    }

    public function generatePassengersPDF()
    {
        $passenger = $this->passengerModel->all();
    
        return \PDF::loadView('relatorio-passageiros-pdf', compact('passenger'))
                    ->setPaper('a4', 'landscape')
                    ->stream('relatorio-de-passageiros.pdf');
    }

 
}
