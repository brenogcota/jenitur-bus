<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Trip;
use App\Format;
use App\Validate;
use App\Utils;
use DB;
use Auth;

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
        

        return view('pages.passageiros')->with(compact('passenger'));
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

            $passenger->POLTRONA = $request->poltrona;

            $passenger->CODVIAGEM = $id;

            $user = Auth::user()->name;

            $passenger->USUARIO = $user;


            $valCPF =  $this->validate;
            $valCPF->validateCPF($request->cpf);
            if($valCPF == true)
                $passenger->CPF = $request->cpf;
            else
                return '<script> alert("CPF Inválido!") </script>';

            if($request->documento_crianca) {
                $passenger->POSSCRIANCA = 'SIM';
                $passenger->NOMECRIANCA = $request->nome_crianca;
                $passenger->DOCCRIANCA = $request->documento_crianca;
            
            }


            $res = $this->Utils->updateVacancie($id);
            if ($res == 'ok'){
                $passenger->save();
                echo '<script> alert("Passageiro cadastrado!") </script>';
                return view('pages.cadastrar_passageiro');

            }
            else {
                echo  '<script> alert("Erro ao cadastrar!") </script>';
                return view('pages.cadastrar_passageiro');
            }
        
    }

    public function show($id)
    {

        
        $passenger = $this->PassengerModel->where('CODVIAGEM', $id)->get();
        
        return view('pages.passageiros')->with(compact('passenger'));
    }

    public function edit($id)
    {
        //

        return view('pages.edit-passageiro')->with(compact('id'));
    }

  
    public function update(Request $request, $id)
    {
        $passenger = $this->PassengerModel->find($id);
        

        
        if(is_null($request->poltrona))
        {
            $vacancie = $this->Utils->returnVacancies($id);
            $passenger->POLTRONA = $vacancie;
        } else {
            $passenger->POLTRONA = $request->poltrona;
        }

        if($request->documento_crianca) {
            $update = $passenger->update([
                'POSSCRIANCA' => 'SIM',
                'NOMECRIANCA'  => $request->nome_crianca, 
                'DOCCRIANCA'  => $request->documento_crianca

            ]);
        
        }

        if($passenger)
        {
            $update = $passenger->update([
                'NOME' => $request->nome, 
                'RG'   => $request->rg, 
                'DATANASC'  => $request->datanasc, 
                'TELEFONE1'  => $request->telefone1, 
                'TELEFONE2'  => $request->telefone2,
                'CPF'  => $request->cpf, 
            ]);


            

            $passenger->save();
            echo '<script> alert("Passageiro atualizado!") </script>';
            return view('home');
          }
          else {
              echo '<script> alert("Tente novamente mais tarde!") </script>';
              return view('home');
          }

    }

    
    public function destroy($id)
    {
        $passenger = $this->PassengerModel->find($id);
        $id_viagem = $passenger->CODVIAGEM;
        $util = $this->Utils;

        $util->removeVacancie($id_viagem);

        if($passenger){
            $delete = $passenger->delete();
            return $this->index();
        }
        else{
            echo '<script> alert("Erro ao excluir!") </script>';
            return $this->index();
        }
    }


    
}

?>