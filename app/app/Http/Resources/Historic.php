<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Historic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = array();
        $data_historic = array();
        //recuperando os ultimos 3 lançamentos
        foreach($this->historic()->limit(3)->orderBy('created_at','desc')->get() as $historic){    
            $data_historic['id'] = $historic->id;
            $data_historic['action'] = $historic->action;
            $data_historic['value'] = $historic->value;
            $data_historic['created_at'] = $historic->created_at->format('d/m/Y H:i:s');
            array_push($data,$data_historic);
        }

        return $data;
    }
}
