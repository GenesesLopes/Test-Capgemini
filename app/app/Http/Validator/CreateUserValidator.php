<?php

namespace App\Http\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CreateUserValidator
{
    private function rules(): array
    {
        return [
            'email' =>  'required|email:filter|unique:users,email',
            'name'  =>  'required|string',
            'cpf'   =>  'required|unique:users,cpf'
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

        if ($validator->fails())
            return $validator->getMessageBag()->toArray();

        return [];
    }
}
