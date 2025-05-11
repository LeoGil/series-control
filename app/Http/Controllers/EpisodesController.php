<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        DB::transaction(function () use ($request, $season) {
            $season->episodes()->update([
                'watched' => false
            ]);
    
            if ($request->has('episodes')) {
                Episode::whereIn('id', $request->episodes)->update([
                    'watched' => true
                ]);
            }
        });
        
        return redirect()->back()->with('mensagem.sucesso', 'Marcação salva com sucesso!');
    }
}
