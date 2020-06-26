<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $fillable = [
        'user_id',
        'user_recipient',
        'action',
        'created_at'
    ];

    /*Relacionamentos*/

    //Usuário emissor
    public function userSender()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    //usuário receptor
    public function userRecipient()
    {
        return $this->belongsTo(User::class,'user_recipient');
    }
    


}
