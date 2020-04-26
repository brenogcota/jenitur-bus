<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Validate;

class DriverController extends Controller
{
    //

    private $driverModel;
    private $validate;

    public function __construct(Driver $driver, Validate $validate)
    {
        
        $this->driverModel = $driver;
    }

    public function index()
    {
        $driver = $this->driverModel::all();
        
        
        return view('pages.motorista')->with(compact('driver'));
        
    }

    
    public function create()
    {
        return view('pages.motorista');
    }

    
    public function store(Request $request)
    {
    
       $driver = $this->driverModel;
       
       $driver->NOME = $request->nome;
       $driver->TELEFONE = $request->telefone;
       $driver->WHATSAPP = $request->whatsapp;
       $driver->RG = $request->rg;

       $valCPF =  $this->validate;
       $valCPF->validateCPF($request->cpf);
       if($valCPF == true)
            $driver->CPF = $request->cpf;
       else
           return '<script> alert("CPF Inválido!") </script>';

       
      $driver->save();
      return $this->index();

    }

    public function show($id)
    {

        
        $driver = $this->driverModel->find($id);

        return view('pages.motorista')->with(compact('driver'));

    }


    public function edit($id)
    {
        return view('pages.edit-motorista')->with(compact('id'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $driver = $this->driverModel->find($id);

        if($driver)
        {
            $update = $driver->update([
                'NOME' => $request->nome,
                'TELEFONE' => $request->telefone,
                'WHATSAPP' => $request->whatsapp,
                'CPF' => $request->cpf,
                'RG' => $request->rg
            ]);
           
            echo '<script> alert("Dados atualizados!") </script>';
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
        $driver = $this->driverModel->find($id);
        
        if($driver)
        {
          $delete = $driver->delete();
          return $this->index();
        }
        else {
            echo '<script> alert("Tente novamente mais tarde!") </script>';
           
        }
    }
}
