<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //gerar numeros de agencia e conta Corrente
    public function generate(): array
    {
        $number = mt_rand();
        $agency = preg_replace("/(\d{2})(\d{1})/i","$1-$2",substr($number,0,3));
        $account = preg_replace("/(\d{2})(\d{3})(\d{1})/i","$1.$2-$3",substr($number,3));
        
        return [
            'agency' => $agency,
            'account' => $account
        ];
    }

    public function store(Request $request){
        $data = [
            'dados_pessoais' => $request->all(),
            'dados_bancarios' => $this->generate()
        ];
        return response($data,201);
    }

    public function information(string $agency, string $account)
    {
        dd($agency,$account);
    }

}
