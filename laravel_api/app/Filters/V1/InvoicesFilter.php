<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter {
    //$table->integer('customer_id');
    protected $safeParms = [
        'customer_id'=>['eq','ne']
    ];

    protected $columnMap = [
        'customer_id'=>'customer_id'
    ];

    protected $operatorMap = [
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!='
    ];

}