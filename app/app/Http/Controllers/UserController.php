<?php

namespace App\Http\Controllers;

use App\Historic;
use Illuminate\Http\Request;

use App\Http\Validator\{
    CreateUserValidator,
    BankInformationValidator,
    DepositValidator,
    WithdrawValidator
};
use App\User;
use App\Utils\BankInformation;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\{
    User as UserResource,
    UserCreate,
    Balance
};

class UserController extends Controller
{
    //retorna usuario
    private function user(string $agency, string $account): User
    {
        return User::where('account', BankInformation::accountDigits($account))
        ->where('agency', BankInformation::agencyDigits($agency))
        ->first();
    }

    //Criação de novos usuários
    public function store(Request $request, CreateUserValidator $validatorUser)
    {

        //Validando entradas
        $validatedData = $validatorUser->validator($request);

        if (count($validatedData))
            return response($validatedData, 422);
        //gerando numero de 10 caracteres para conta conrrente e agência
        do {
            $number = substr(mt_rand(), 0, 10);
        } while (strlen($number) !== 10);

        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->cpf = $request->cpf;
            $user->email = $request->email;
            $user->agency = substr($number, 0, 3);
            $user->account = substr($number, 3, 9);
            $user->save();
            DB::commit();
            return new UserCreate($user);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível realizar a operação, favor entrar em contato com o nosso suporte'
            ], 500);
        }
    }
    //Recuperação de dados pessoais
    public function information(string $agency, string $account, BankInformationValidator $validatorInformation)
    {

        $validatedData = $validatorInformation->validator([
            'agency'    =>  $agency,
            'account'   =>  $account
        ]);

        if (count($validatedData))
            return response($validatedData, 422);

        //recuperando usuário
        $user = $this->user($agency,$account);

        return new UserResource($user);
        
    }

    //Saldo
    public function balance(string $agency, string $account, BankInformationValidator $validatorInformation)
    {

        $validatedData = $validatorInformation->validator([
            'agency'    =>  $agency,
            'account'   =>  $account
        ]);
        //validando dados
        if (count($validatedData))
            return response($validatedData, 422);
        //recuperando  dados do usuário e histórico
        $user = $this->user($agency,$account);
        return new Balance($user);
        
    }

    //Depósito
    public function deposit(Request $request, DepositValidator $validatorDeposit)
    {
        $validatedData = $validatorDeposit->validator($request->all());
        if (count($validatedData))
            return response($validatedData, 422);

        //consutando usuário
        $user = $this->user($request->agency,$request->account);
        try {
            DB::beginTransaction();
            $user->balance += $request->value;
            $user->save();
            $user->historic()->save(
                new Historic(['action' => 'deposit', 'value' => $request->value])
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível realizar a operação, favor entrar em contato com o nosso suporte'
            ], 500);
        }
    }

    //Saque
    public function withdraw(Request $request, WithdrawValidator $validatorWithdraw)
    {
        $validatedData = $validatorWithdraw->validator($request->all());
        if (count($validatedData))
            return response($validatedData, 422);
        //consutando usuário
        $user = $this->user($request->agency,$request->account);
        try {
            DB::beginTransaction();
            $user->balance -= $request->value;
            $user->save();
            $user->historic()->save(
                new Historic(['action' => 'withdraw', 'value' => $request->value])
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível realizar a operação, favor entrar em contato com o nosso suporte'
            ], 500);
        }
        //return response($request->all());
    }
}
