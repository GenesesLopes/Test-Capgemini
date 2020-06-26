<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Casts\Value;
class Historic extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'value',
        'created_at'
    ];

    protected $casts = [
        'value' => Value::class
    ];
    /*Relacionamentos*/

    //Usuário
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
    


}
