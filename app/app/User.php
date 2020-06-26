<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Casts\{
    Cpf,
    Account,
    Agency,
    Value
};

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cpf', 'created_at'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'cpf'   => Cpf::class,
        'account' => Account::class,
        'agency' => Agency::class,
        'balance' => Value::class
    ];

    //relacionamentos
    public function historic()
    {
        return $this->hasMany(Historic::class, 'user_id');
    }
    
    //Verificar Cpf
    public function getCpf($cpf): ?User
    {
        foreach(self::all() as $user){
            if($user->cpf === $cpf)
                return $user;
        }
        return null;
    }
}
