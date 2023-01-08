<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create'); 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'=>['required'],
            'telefone'=>['required'],
            'cpf'=>['required'],
            'placaDoCarro'=>['required'],
            'marca'=>['required'],
            'cor'=>['required'],
        ];
    }

     protected function prepareForValidation(){
        $this->merge([
            'placa_do_carro' => $this->placaDoCarro
        ]);
    }
}
