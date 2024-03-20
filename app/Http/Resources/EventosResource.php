<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => HashIdsEncode($this->id),
            'evento' => $this->evento,
            'data' => $this->data,
            'horario' => $this->horario,
            'descricao' => $this->descricao,
            'banner' => $this->banner
        ];
    }
}
