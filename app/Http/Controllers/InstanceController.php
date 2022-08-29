<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Entrepot;
use App\Models\Instance;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\InstanceCreateRequest;
use App\Http\Requests\InstanceUpdateRequest;

class InstanceController extends Controller
{
    public function index(){

        $instances = Instance::orderBy("id")->paginate(5);
        
        return view('sanru.instance.index', ['instances' => $instances]);
    }
    public function create(){

        $articles = Article::all();
        $entrepots = Entrepot::all();
        
        return view('sanru.instance.create', compact('articles', 'entrepots'));
    }
    public function store(Instance $instance, InstanceCreateRequest $request){
     
        $instance->numero_serie = $request->get('numSerie');
        $instance->utilisable = $request->get('utilisable');
        $instance->status = $request->get('status');
        $instance->article_id = $request->get('article');
        $instance->entrepot_id = $request->get('entrepot');

        if($instance->save())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('instance.index');

       }

       public function update(Instance $instance, InstanceUpdateRequest $request){
     
        $instance->numero_serie = $request->get('numSerie');
        $instance->utilisable = $request->get('utilisable');
        $instance->status = $request->get('status');
        $instance->article_id = $request->get('article');
        $instance->entrepot_id = $request->get('entrepot');

        if($instance->update())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('instance.index');

       }
       public function edit(Instance $instance){
        
        $entrepots = Entrepot::all();
        $articles = Article::all();

        return view('sanru.instance.edit', compact('instance','entrepots', 'articles'));
   }
   public function destroy(Instance $instance){
    
    $num = $instance->numero_serie;

    if($instance->delete())
    {
        Alert::success('Fait', "$num a été supprimé avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('instance.index');

}
}
