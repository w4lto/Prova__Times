<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter {
    protected $safeParms = [
        'nome' => ['eq'],
        'telefone'=>['eq'],
        'cpf'=>['eq'],
        'plcadaDoCarro'=>['eq', 'gt', 'lt'],
        'marca'=>['eq'],
        'cor'=>['eq'],
    ];

    protected $columnMap = [
        'placaDoCarro' => 'placa_do_carro',
        'nome'=>'nome',
        'telefone'=>'telefone',
        'cpf'=>'cpf',
        'marca'=>'marca',
        'cor'=>'cor',
    ];

    protected $operatorMap = [
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
    ];

}