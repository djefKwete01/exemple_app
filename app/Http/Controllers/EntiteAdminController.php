<?php

namespace App\Http\Controllers;

use App\Models\EntiteAdmin;
use Illuminate\Http\Request;
use App\Models\TypeEntiteAdmin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\EntiteAdminRequest;
use App\Http\Requests\EntiteAdminCreateRequest;

class EntiteAdminController extends Controller
{
    public function index(){
        $EntiteAdmins = EntiteAdmin::orderBy("id")->paginate(5);
        
        return view('sanru.entite_admin.index', ['EntiteAdmins' => $EntiteAdmins]);
    }
    public function destroy(EntiteAdmin $entite_admin){
    
        $name = $entite_admin->nom;

        if($entite_admin->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('entite_admin.index');

   }
   public function edit(EntiteAdmin $entite_admin){
        
        $TypeEntiteAdmins = TypeEntiteAdmin::all();

        return view('sanru.entite_admin.edit', compact('entite_admin', 'TypeEntiteAdmins'));
   }

   public function update(EntiteAdmin $entite_admin, EntiteAdminRequest $request){
    
    $entite_admin->nom = $request->get('name');
    $entite_admin->type_entite_admin = $request->get('type_entite_admin');

    if($entite_admin->update())
    {
        Alert::success('Fait', "La mise à jour de $entite_admin->nom a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('entite_admin.index');

   }

   public function create(){

        $TypeEntiteAdmins = TypeEntiteAdmin::all();
        
        return view('sanru.entite_admin.create', ['TypeEntiteAdmins' => $TypeEntiteAdmins]);
    
    }
    public function store(EntiteAdmin $entite_admin, EntiteAdminCreateRequest $request){

        $entite_admin->nom = $request->get('name');
        $entite_admin->type_entite_admin = $request->get('type_entite_admin');
    
        if($entite_admin->save())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('entite_admin.index');

       }
}
