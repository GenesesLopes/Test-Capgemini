<?php

namespace App\Http\Validator;


use Illuminate\Support\Facades\Validator;
use App\Rules\{
    Agency,
    Account
};
use App\Utils\BankInformation;

class DepositValidator
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
        //number_format(str_replace(",","",$request['value']),2,".","")
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

        if ($validator->fails())
            return $validator->getMessageBag()->toArray();

        return [];
    }
}
