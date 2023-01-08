<?php

namespace App\Http\Resources\V1;

use App\Models\Invoice;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'id' => $this->id,
            'nome'=>$this->nome,
            'telefone'=> $this->telefone,
            'cpf'=>$this->cpf,
            'placaDoCarro' => $this-> placa_do_carro,
            'cor'=>$this->cor,
            'invoices'=> InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
