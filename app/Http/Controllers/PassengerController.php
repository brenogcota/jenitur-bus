<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Trip;
use App\Format;
use App\Validate;
use App\Utils;

class PassengerController extends Controller
{

    private $PassengerModel;
    private $Trip;
    private $format;
    private $validate;
    private $Utils;


    public function __construct(Passenger $passenger, Trip $trip, Format $format, Validate $validate, Utils $util){

        $this->PassengerModel = $passenger;
        $this->Trip = $trip;
        $this->format = $format;
        $this->validate = $validate;
        $this->Utils = $util;
    }
    
    public function index()
    {
        $passenger = $this->PassengerModel::all();
        $format = $this->format;

        foreach($passenger as $p){
            $date = $format->formatDate($p->DATANASC);
            $p->DATANASC = $date;
        }
        

        return view('show')->with(compact('passenger'));
    }

    public function create()
    {
        return view('pages.cadastrar_passageiro');
    }

    
    public function store(Request $request, $id)
    {   
       
            $passenger = $this->PassengerModel;

            $passenger->NOME = $request->nome;
            $passenger->RG = $request->rg;
            $passenger->DATANASC = $request->datanasc;
        
            $passenger->TELEFONE1 = $request->telefone1;
            $passenger->TELEFONE2 = $request->telefone2;

            $passenger->CODVIAGEM = $id;

            $valCPF =  $this->validate;
            $valCPF->validateCPF($request->cpf);
            if($valCPF == true)
                $passenger->CPF = $request->cpf;
            else
                return 'CPF inválido.';

            if($request->cpfcrianca != null)
            {
                $valCPF->validateCPF($request->cpfcrianca);
                if($valCPF == true)
                    $passenger->CPFCRIANCA = $request->cpfcrianca;
                else
                    return 'CPF inválido.';
            }


            $res = $this->Utils->updateVacancie($id);
            if ($res == 'ok'){
                $passenger->save();
                return '<script> alert("Passageiro cadastrado!") </script>';
            }
            else 
                return '<script> alert("Erro ao cadastrar!") </script>';
        
    }

    public function show($id)
    {
         $passenger = $this->PassengerModel->find($id);
         $format = $this->format;

         $date = $format->formatDate($passenger->DATANASC);
         $passenger->DATANASC = $date;

        return view('show')->with(compact('passenger'));
    }

    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        $passenger = $this->PassengerModel->find($id);
        
        if($passenger){
            $passenger->DDD1 = $request->ddd1;
            $passenger->TELEFONE1 = $request->telefone1;
            $passenger->DDD2 = $request->ddd2;
            $passenger->TELEFONE2 = $request->telefone2;

            $passenger->save();
            return 'Passageiro alterado com sucesso!';
        }

        else{
            return 'Mensagem de erro.';
        }

    }

    
    public function destroy($id)
    {
        $passenger = $this->PassengerModel->find($id);

        if($passenger){
            $delete = $passenger->delete();
            return 'Passageiro deletada com sucesso!';
        }
        else{
            return 'Passageiro não encontrado.';
        }
    }


    
}

?>