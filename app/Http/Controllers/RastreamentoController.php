<?php

namespace App\Http\Controllers;


use App\Models\Frete;
use Illuminate\Http\Request;

class RastreamentoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $codRastreio = $request->input('codigo_rastreio', '');

        $frete = Frete::where('codigo_rastreio', $codRastreio)
                        ->with('etapas')
                        ->first();

            if (! $frete) {
                return redirect()->back()->with('error', 'Frete não Encontrado');
            }
            return view('frete.rastreamento', [
                    'frete' => $frete
            ]);   
        
    }
}
