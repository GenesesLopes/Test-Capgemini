<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Historic;
class Balance extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $historic = $this->historic()->limit(3)->orderBy('created_at','desc')->get();
        return [
            'name' => $this->name,
            'cpf' => $this->cpf,
            'balance' => $this->balance,
            'historic' => new Historic($this)
        ];
    }
}
