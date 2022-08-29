<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Entrepot;
use App\Models\Instance;
use App\Models\Mouvement;
use Illuminate\Http\Request;
use App\Models\LigneMouvement;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\LigneMouvementCreateRequest;
use App\Http\Requests\LigneMouvementUpdateRequest;

class LigneMouvementController extends Controller
{
    public function index(){

        $ligneMouvements = LigneMouvement::orderBy("id")->paginate(5);
        
        return view('sanru.ligne_mouvement.index', ['ligneMouvements' => $ligneMouvements]);
    }

    public function create(){

        $mouvements = Mouvement::all();
        $articles = Article::all();
        
        return view('sanru.ligne_mouvement.create', compact('mouvements', 'articles'));
    }
    public function store(LigneMouvement $ligneMouvement, LigneMouvementCreateRequest $request){

        $instance = Instance::where('numero_serie', '=', $request->get('numSerie'))->firstOrFail();
        $article = Article::where('id', '=', $instance->article_id)->firstOrFail();

        $ligneMouvement->mouvement_id = $request->get('mouvement');
        $ligneMouvement->numero_serie = $request->get('numSerie');
        $ligneMouvement->quantite = $request->get('quantite');

        $ligneMouvement->article_id = $article->id;

        if($ligneMouvement->save())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('ligne_mouvement.index');

       }

       public function update(LigneMouvement $ligneMouvement, LigneMouvementUpdateRequest $request){
     
        $instance = Instance::where('numero_serie', '=', $request->get('numSerie'))->firstOrFail();
        $article = Article::where('id', '=', $instance->article_id)->firstOrFail();

        $ligneMouvement->mouvement_id = $request->get('mouvement');
        $ligneMouvement->numero_serie = $request->get('numSerie');
        $ligneMouvement->quantite = $request->get('quantite');

        $ligneMouvement->article_id = $article->id;

        if($ligneMouvement->update())
        {
            Alert::success('Fait', 'Modification effectuée');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('ligne_mouvement.index');

       }

       public function edit(LigneMouvement $ligne_mouvement){
        
        $articles = Article::all();
        $mouvements = Mouvement::all();

        return view('sanru.ligne_mouvement.edit', compact('mouvements','articles', 'ligne_mouvement'));
   }
   public function destroy(LigneMouvement $ligne_mouvement){

    if($ligne_mouvement->delete())
    {
        Alert::success('Fait', "L'élément a été supprimé avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('ligne_mouvement.index');
    }
}
