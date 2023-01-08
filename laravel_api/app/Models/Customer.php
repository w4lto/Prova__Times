<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'cpf',
        'placa_do_carro',
        'marca',
        'cor',
    ];
    

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
