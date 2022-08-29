<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMouvement;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\TypeMouvementCreateRequest;
use App\Http\Requests\TypeMouvementUpdateRequest;

class TypeMouvementController extends Controller
{
    public function index(){
        $typeMouvements = TypeMouvement::orderBy("nom")->paginate(5);
    
        return view('sanru.type_mouvement.index', ['typeMouvements' => $typeMouvements]);
    }
    public function destroy(TypeMouvement $type_mouvement){
    
        $name = $type_mouvement->nom;

        if($type_mouvement->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('type_mouvement.index');

   }
   public function edit(TypeMouvement $type_mouvement){

        return view('sanru.type_mouvement.edit', compact('type_mouvement'));
   }

   public function update(TypeMouvement $type_mouvement, TypeMouvementUpdateRequest $request){

    $type_mouvement->nom = $request->get('name');

    if($type_mouvement->update())
    {
        Alert::success('Fait', "La mise à jour de $type_mouvement->nom a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('type_mouvement.index');

   }

   public function create(){

        return view('sanru.type_mouvement.create');

   }

   public function store(TypeMouvement $type_mouvement, TypeMouvementCreateRequest $request){

    $type_mouvement->nom = $request->get('name');

    if($type_mouvement->save())
    {
        Alert::success('Fait', 'Ajout effectué');
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
    }
    
    return redirect()->route('type_mouvement.index');

   }
}
