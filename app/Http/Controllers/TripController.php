<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Trip;
Use App\Format;
Use App\Validate;

class TripController extends Controller
{

    private $tripModel;
    private $format;
    private $validate;

    public function __construct(Trip $trip, Format $format, Validate $validate)
    {
        $this->tripModel = $trip;
        $this->format = $format;
        $this->validate = $validate;

    }


    
    public function index()
    {
        $trip = $this->tripModel->orderBy('DATA', 'DESC')->get();
        foreach($trip as $t){
            $format = $this->format;
            $date = $format->formatDate($t->DATA);
            $hour = $format->formatHour($t->HORARIO);
            $t->DATA = $date;
            $t->HORARIO = $hour;    
        }
        
        return view('pages.viagens')->with(compact('trip'));
        
    }

    
    public function create()
    {
        return view('form');
    }

    
    public function store(Request $request)
    {
    
       $trip = $this->tripModel;
       $trip->ORIGEM = $request->origem;
       $trip->DESTINO = $request->destino;
       $trip->DATA = $request->data;
       $trip->HORARIO = $request->horario;

       $valBoard = $this->validate->validateBoard($request->placa);

       if ($valBoard == 'ok')
       {
            $trip->PLACAVEICULO = $request->placa;
       }
       else
            return 'placa invalida';
       
      $trip->save();
      return 'viagem criada!';

    }

    public function show($id)
    {

        $format = $this->format;     
        $trip = $this->tripModel->find($id);
        $date = $format->formatDate($trip->DATA);
        $hour = $format->formatHour($trip->HORARIO);
        $trip->DATA = $date;
        $trip->HORARIO = $hour;

        return view('show')->with(compact('trip'));

    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
        $trip = $this->tripModel->find($id);

        if($trip)
        {
            $update = $trip->update([
                'ORIGEM' => $request->origem,
                'DESTINO' => $request->destino,
                'DATA' => $request->data,
                'HORARIO' => $request->horario,
            ]);
           
            return 'viagem alterada';
        } 
        else 
            return 'erro';    

    }

  
    public function destroy($id)
    {
        //
        $trip = $this->tripModel->find($id);
        
        if($trip)
        {
          $delete = $trip->delete();
          return 'viagem deletada';
        }
        else 
            return 'viagem não encontrada';
    }

    
}
