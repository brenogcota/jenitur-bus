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
        $trip = $this->tripModel->orderBy('DATA', 'DESC')->limit(10)->get();
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
        return view('pages.cadastrar_viagem');
    }

    
    public function store(Request $request)
    {
    
       $trip = $this->tripModel;
       $trip->ORIGEM = $request->origem;
       $trip->DESTINO = $request->destino;
       $trip->DATA = $request->data;
       $trip->HORARIO = $request->horario.':00';
       $trip->PLACAVEICULO = $request->placa;
       $trip->MOTORISTA = $request->motorista;

       if($request->motorista2)
       {
           $trip->MOTORISTA2 = $request->motorista2;
       }

       if($request->observacao){
           $trip->OBSERVACAO = $request->observacao;
       }
    
       
      $trip->save();
      return $this->index();

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
        return view('pages.edit')->with(compact('id'));
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
                'STATUS' => $request->status,
                'MOTORISTA' => $request->motorista,
                'MOTORISTA2' => $request->motorista2,
            ]);
           
            echo '<script> alert("Viagem atualizada!") </script>';
            return $this->index();
          }
          else {
              echo '<script> alert("Tente novamente mais tarde!") </script>';
              return $this->index();
          }
      }

  
    public function destroy($id)
    {
        //
        $trip = $this->tripModel->find($id);
        
        if($trip)
        {
          $delete = $trip->delete();
          return $this->index();
        }
        else {
            echo '<script> alert("Tente novamente mais tarde!") </script>';
            return $this->index();
        }
    }

    
}
