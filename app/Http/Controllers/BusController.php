<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
Use App\Validate;

class BusController extends Controller
{
    //
    private $busModel;
    private $validate;

    public function __construct(Bus $bus,  Validate $validate)
    {
        
        $this->busModel = $bus;
        $this->validate = $validate;
    }


    
    public function index()
    {
        $bus = $this->busModel::all();
        
        
        return view('pages.onibus')->with(compact('bus'));
        
    }

    
    public function create()
    {
        return view('pages.onibus');
    }

    
    public function store(Request $request)
    {
    
       $bus = $this->busModel;
       
       $bus->MODELO = $request->modelo;
       $bus->APOLICE = $request->apolice;
       $bus->NUMERO = $request->numero;
       $bus->POLTRONAS = $request->poltronas;

       if($request->observacao)
       {
           $bus->OBSERVACAO = $request->observacao;
       }

       $valBoard = $this->validate->validateBoard($request->placa);


       if ($valBoard == 'ok')
       {
            $bus->PLACA = $request->placa;
       }
       else {
            echo '<script> alert("Placa inválida!") </script>';
            return view('pages.onibus');
       }
       
      $bus->save();
      return $this->index();
    }

    public function show($id)
    {

        
        $bus = $this->busModel->find($id);

        return view('pages.onibus')->with(compact('bus'));

    }


    public function edit($id)
    {
        return view('pages.onibus')->with(compact('id'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $bus = $this->busModel->find($id);

        if($bus)
        {
            $update = $bus->update([
                'PLACA' => $request->placa,
                'MODELO' => $request->modelo,
                'APOLICE' => $request->apolice,
                'OBSERVACAO' => $request->observacao,
                'NUMERO' => $request->numero,
                'POLTRONAS' => $request->poltronas
            ]);
           
            echo '<script> alert("Dados atualizados!") </script>';
            
          }
          else {
              echo '<script> alert("Tente novamente mais tarde!") </script>';
              
          }
      }

  
    public function destroy($id)
    {
        //
        $bus = $this->busModel->find($id);
        
        if($bus)
        {
          $delete = $bus->delete();
          
        }
        else {
            echo '<script> alert("Tente novamente mais tarde!") </script>';
            
        }
    }
}
