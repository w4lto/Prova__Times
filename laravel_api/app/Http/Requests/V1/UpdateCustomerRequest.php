<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();

        if($method == 'PUT')
        {
            return [
                'nome'=>['required'],
                'telefone'=>['required'],
                'cpf'=>['required'],
                'placaDoCarro'=>['required'],
                'marca'=>['required'],
                'cor'=>['required'],
            ];
        } else {
            return [
                'nome'=>['sometimes','required'],
                'telefone'=>['sometimes','required'],
                'cpf'=>['sometimes','required'],
                'placaDoCarro'=>['sometimes','required'],
                'marca'=>['sometimes','required'],
                'cor'=>['sometimes','required'],
            ];
        }

        
    }

     protected function prepareForValidation(){
        if($this->placaDoCarro)
        {
            $this->merge([
                'placa_do_carro' => $this->placaDoCarro
            ]);
        }
    }   
}
