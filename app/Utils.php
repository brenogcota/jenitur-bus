<?php
Namespace App;
use App\Models\Passenger;
use App\Models\Trip;

class Utils {


    public function returnVacancies()
    {

        $passenger = new Passenger();

        $vacancies = $passenger::all();
        $arr = [];
        foreach($vacancies as $v){
              $ar = $v->POLTRONA;
              array_push($arr, $ar);
        }

        
        return $arr;
        
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

    public function teste()
    {
        
        $trip = $this->tripModel;
        $trip->ORIGEM = 'Jenipapo, MG';
        $trip->DESTINO = 'Belo Horizonte, SP';
        $trip->DATA = '2020-03-05';
        $trip->HORARIO = '05:00:00';
        $trip->PLACAVEICULO = 'PZU-7682';

        $valBoard = $this->validate->validateBoard($trip->PLACAVEICULO);
        if ($valBoard == 'ok'){
            $trip->PLACAVEICULO = $trip->PLACAVEICULO;
        }
        else
            return 'placa invalida';
        

        $trip->save();

    

       return 'viagem criada!';
    }
}

?>