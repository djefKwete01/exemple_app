<?php

namespace App\Http\Controllers;

use App\Models\Entrepot;
use App\Models\Mouvement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TypeMouvement;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\MouvementCreateRequest;
use App\Http\Requests\MouvementUpdateRequest;

class MouvementController extends Controller
{
    public function index(){

        $mouvements = Mouvement::orderBy("id")->paginate(5);
        
        return view('sanru.mouvement.index', ['mouvements' => $mouvements]);
    }
    public function show(Mouvement $mouvement){
        
        return view('sanru.mouvement.show', compact('mouvement'));
    }

    public function create(){

        $typeMouvements = TypeMouvement::all();
        $entrepots = Entrepot::all();
        
        return view('sanru.mouvement.create', compact('typeMouvements', 'entrepots'));
    }
    public function store(Mouvement $mouvement, MouvementCreateRequest $request){
    
        $mouvement->beneficiaire = $request->get('beneficiaire');
        $mouvement->expediteur = $request->get('expediteur');
        $mouvement->type_mouvement_id = $request->get('typeMouvement');

        $old = Mouvement::all()->last();

        //On genere un nom 

        if(isset($old->nom) && !empty($old->nom)){
            $liste = explode('-', $old->nom);
            $next = (int) $liste[1] + 1;
            $chaine = $liste[0].'-'.$next;
            $mouvement->nom = $chaine;
           
        }else{
            $mouvement->nom = "MVT-0";
        
        }

        if($mouvement->save())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('mouvement.index');

       }

       public function update(Mouvement $mouvement, MouvementUpdateRequest $request){
     
        
        $mouvement->beneficiaire = $request->get('beneficiaire');
        $mouvement->expediteur = $request->get('expediteur');
        $mouvement->type_mouvement_id = $request->get('typeMouvement');
    ;

        if($mouvement->update())
        {
            Alert::success('Fait', 'Modification effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('mouvement.index');

       }
       public function edit(Mouvement $mouvement){
        
        $typeMouvements = TypeMouvement::all();
        $entrepots = Entrepot::all();

        return view('sanru.mouvement.edit', compact('typeMouvements','entrepots', 'mouvement'));
   }
   public function destroy(Mouvement $mouvement){
    $nom = $mouvement->nom;
    if($mouvement->delete())
    {
        Alert::success('Fait', "Le mouvement $nom a été supprimé avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('mouvement.index');
    }
}
