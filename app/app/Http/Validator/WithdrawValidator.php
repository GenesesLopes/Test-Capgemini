<?php

namespace App\Http\Validator;


use Illuminate\Support\Facades\Validator;
use App\Rules\{
    Agency,
    Account
};
use App\User;
use App\Utils\BankInformation;

class WithdrawValidator
{
    private function rules(): array
    {
        return [
            'agency'   =>  ['required','size:3', new Agency],
            'account'  =>  ['required','size:7', new Account],
            'value'    =>  ['required','numeric','min:1.00','max:9999999999.99']
        ];
    }

    private function attributeNames(): array
    {
        return [
            'agency'   =>  'agencia',
            'account'  =>  'conta',
            'value'    =>  'valor'
        ];
    }

    //formatando numero para o qual a base de dados aceita
    private function prepareForValidation(array $request): array
    {
        return [
            'agency'    =>  BankInformation::agencyDigits($request['agency']),
            'account'   =>  BankInformation::accountDigits($request['account']),
            'value'     =>  BankInformation::databaseDefaultValue($request['value'])
        ];
    }
    //método que valida as entradas
    public function validator(array $request): array
    {
        
        $request = $this->prepareForValidation($request);
        
        $validator = Validator::make($request, $this->rules(), [], $this->attributeNames());
        
        //se não houver falhas, realizar validação de saldo
        if(!$validator->fails()){
            //Validação de saldo
            $validator->after(function ($validator) use ($request) {

                $balance = User::where('agency',$request['agency'])
                ->where('account',$request['account'])
                ->where('balance','>=',$request['value'])
                ->exists();
                if(!$balance)
                    $validator->errors()->add('value','Saldo insuficiênte para realizar tal operação!');

            });
            
        }

        if($validator->fails())
            return $validator->getMessageBag()->toArray();
        return [];
    }
}
