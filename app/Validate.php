<?php
Namespace App;

use App\Models\User;


class Validate {

    public function validateBoard($string){

        if (preg_match('/^[A-Z]{3}\-[0-9]{4}$/', $string)) {
            return 'ok';
        } else {
            return 'placa invalida';
        }

    }


    public function validateCPF($cpf){
 
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        if (strlen($cpf) != 11) {
            return false;
        }
    
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}