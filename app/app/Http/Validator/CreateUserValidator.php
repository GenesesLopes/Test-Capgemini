<?php

namespace App\Http\Validator;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CreateUserValidator
{
    private function rules(): array
    {
        return [
            'email' =>  'required|email:filter|unique:users,email',
            'name'  =>  'required|string',
            'cpf'   =>  'required|cpf'
        ];
    }

    private function attributeNames(): array
    {
        return [
            'name' => 'nome',
        ];
    }
    //método que valida as entradas
    public function validator(Request $request): array
    {
        
        $validator = Validator::make($request->all(), $this->rules(), [], $this->attributeNames());

        //Validações personalizadas
        $validator->after(function ($validator) use ($request) {
            $user = (new User())->getCpf($request->cpf);
            /**verificando se o cpf já esta cadastrado */
            if(!is_null($user))
                $validator->errors()->add('cpf','CPF encontra-se cadastrado em nossa base de dados!');
            
        });

        if ($validator->fails())
            return $validator->getMessageBag()->toArray();

        return [];
    }
}
