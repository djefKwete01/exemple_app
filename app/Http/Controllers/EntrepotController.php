<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntrepotCreateRequest;
use App\Http\Requests\EntrepotUpdateRequest;
use App\Models\Entrepot;
use App\Models\EntiteAdmin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EntrepotController extends Controller
{
    public function index(){

        $entrepots = Entrepot::orderBy("nom")->paginate(5);
        
        return view('sanru.entrepot.index', ['entrepots' => $entrepots]);
    }

    public function destroy(Entrepot $entrepot){
    
        $name = $entrepot->nom;

        if($entrepot->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('entrepot.index');

   }
   public function edit(Entrepot $entrepot){
        
        $entiteAdmins = EntiteAdmin::all();

        return view('sanru.entrepot.edit', compact('entrepot', 'entiteAdmins'));
   }

   public function update(Entrepot $entrepot, EntrepotUpdateRequest $request){
    
    $entrepot->nom = $request->get('name');
    $entrepot->entite_admin = $request->get('localisation');

    if($entrepot->update())
    {
        Alert::success('Fait', "La mise à jour de $entrepot->nom a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('entrepot.index');

   }

   public function create(){

        $entiteAdmins = EntiteAdmin::all();
        
        return view('sanru.entrepot.create', ['entiteAdmins' => $entiteAdmins]);
    
    }
    public function store(Entrepot $entrepot, EntrepotCreateRequest $request){
        
        $entrepot->nom = $request->get('name');
        $entrepot->entite_admin = $request->get('localisation');

        if($entrepot->save())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('entrepot.index');

       }
}
