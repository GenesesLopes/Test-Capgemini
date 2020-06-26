<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Validator\CreateUserValidator;


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

    //Criação de novos usuários
    public function store(Request $request, CreateUserValidator $validatorUser)
    {
        //Validando entradas
        $validatedData = $validatorUser->validator($request);

        if(count($validatedData))   
            return response($validatedData,422);
        $data = [
            'dados_pessoais' => $request->all(),
            'dados_bancarios' => $this->generate()
        ];
        return response($data,201);
    }
    //Recuperação de dados pessoais
    public function information(string $agency, string $account)
    {
        dd(12);
    }

    //Saldo
    public function balance(string $agency, string $account)
    {
        dd($agency,$account);
    }

    //Depósito
    public function deposit(Request $request)
    {
        return response($request->all());
    }
    
    //Saque
    public function withdraw(Request $request)
    {
        return response($request->all());
    }


}
