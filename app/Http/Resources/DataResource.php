<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
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
            'user_id' => HashIdsEncode($this->user_id),
            'lider_ministerio' => $this->lider_ministerio,
            'convertido' => $this->convertido,
            'ministerio' => $this->ministerio,
            'batizado' => $this->batizado,
            'celula' => $this->celula,
        ];
    }
}
