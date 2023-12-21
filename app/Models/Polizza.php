<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polizza extends Model
{
    use HasFactory;
    protected $table = 'polizze';
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->numero_polizza = $attributes['numero_polizza'];
        $this->premio = $attributes['premio'] ?? null;
        $this->decorezza_polizza = $attributes['decorezza_polizza'];
        $this->scadenza_prima_rata = $attributes['scadenza_prima_rata'];
        $this->scadenza_polizza = $attributes['scadenza_polizza'];
        $this->periodicità = $attributes['periodicità'] ?? 'annuale';
        $this->assicurazione_id = $attributes['assicurazione_id'];
    }
}
