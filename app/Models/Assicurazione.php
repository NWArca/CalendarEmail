<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assicurazione extends Model
{
    use HasFactory;
    protected $table = 'assicurazioni';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->nome_compagnia = $attributes['nome_compagnia'];
        $this->indirizzo = $attributes['indirizzo'] ?? null;
        $this->nome_referente = $attributes['nome_referente'] ?? null;
        $this->numero_telefono = $attributes['numero_telefono'] ?? null;
        $this->email = $attributes['email'] ?? null;
    }
}
