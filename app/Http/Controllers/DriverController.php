<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    //

    private $driverModel;

    public function __construct(Driver $driver)
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
        return view('')->with(compact('id'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $driver = $this->driverModel->find($id);

        if($driver)
        {
            $update = $driver->update([
                'NOME' => $request->nome,
                'TELEFONE' => $request->modelo,
                'WHATSAPP' => $request->whatsapp,
                
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
        $driver = $this->driverModel->find($id);
        
        if($driver)
        {
          $delete = $driver->delete();
        
        }
        else {
            echo '<script> alert("Tente novamente mais tarde!") </script>';
           
        }
    }
}
