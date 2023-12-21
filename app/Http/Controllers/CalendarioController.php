<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('calendario');
    }

    public function getEventi()
    {
        // Ottieni gli eventi da Polizze
        $eventiPolizze = Polizza::all(['scadenza_prima_rata', 'scadenza_polizza'])
            ->map(function ($polizza) {
                return [
                    'title' => 'Polizza: Scadenza Prima Rata',
                    'start' => $polizza->scadenza_prima_rata,
                ];
            })
            ->merge(Polizza::all(['scadenza_prima_rata', 'scadenza_polizza'])
            ->map(function ($polizza) {
                return [
                    'title' => 'Polizza: Scadenza Seconda Rata',
                    'start' => $polizza->scadenza_prima_rata,
                ];
            }));

        // Ottieni gli eventi da Condomini
        $eventiCondomini = Condominio::all(['fine_anno_condominiale', 'scadenza_prima_rata', 'scadenza_seconda_rata'])
            ->map(function ($condominio) {
                return [
                    'title' => 'Condominio: Fine Anno Condominiale',
                    'start' => $condominio->fine_anno_condominiale,
                ];
            })
            ->merge(Condominio::all(['scadenza_prima_rata', 'scadenza_seconda_rata'])
            ->map(function ($condominio) {
                return [
                    'title' => 'Condominio: Scadenza Prima Rata',
                    'start' => $condominio->scadenza_prima_rata,
                ];
            }))
            ->merge(Condominio::all(['scadenza_prima_rata', 'scadenza_seconda_rata'])
            ->map(function ($condominio) {
                return [
                    'title' => 'Condominio: Scadenza Seconda Rata',
                    'start' => $condominio->scadenza_seconda_rata,
                ];
            }));

        // Combina gli eventi da Polizze e Condomini
        $eventi = $eventiPolizze->merge($eventiCondomini);

        return response()->json($eventi);
    }

}