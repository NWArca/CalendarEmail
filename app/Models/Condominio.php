<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasFactory;
    protected $table = 'condomini';
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->nome = $attributes['nome'];
        $this->inizio_anno_condominiale = $attributes['inizio_anno_condominiale'];
        $this->fine_anno_condominiale = $attributes['fine_anno_condominiale'];
        $this->scadenza_prima_rata = $attributes['scadenza_prima_rata'];
        $this->scadenza_seconda_rata = $attributes['scadenza_seconda_rata'];
        $this->indirizzo = $attributes['indirizzo'];
        $this->codice_fiscale = $attributes['codice_fiscale'];
        $this->polizza_id = $attributes['polizza_id'];
    }
}
