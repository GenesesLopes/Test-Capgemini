<?php

namespace App\Http\Validator;

use Illuminate\Support\Facades\Validator;
use App\Rules\{
    Agency,
    Account
};
use App\Utils\BankInformation;

class BankInformationValidator
{
    private function rules(): array
    {
        return [
            'agency'   =>  ['required','size:3', new Agency],
            'account'  =>  ['required','size:7', new Account],
        ];
    }

    private function attributeNames(): array
    {
        return [
            'agency'   => 'agencia',
            'account'  => 'conta',
        ];
    }

    private function prepareForValidation(array $request): array
    {
        return [
            'agency'    =>  BankInformation::agencyDigits($request['agency']),
            'account'   =>  BankInformation::accountDigits($request['account'])
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
