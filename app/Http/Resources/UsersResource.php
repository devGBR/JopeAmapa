<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'nome' => $this->nome,
            'username' => $this->username,
            'data_nascimento' => $this->data_nascimento,
            'cargo' => $this->cargo,
            'genero' => $this->genero,
            'endereco' => $this->endereco,
            'bairro' => $this->bairro,
            'numero' => $this->numero,
        ];
    }
}
