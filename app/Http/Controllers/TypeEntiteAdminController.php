<?php

namespace App\Http\Controllers;

use App\Models\EntiteAdmin;
use Illuminate\Http\Request;
use App\Models\TypeEntiteAdmin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\EntiteAdminRequest;
use App\Http\Requests\typeEntiteAdminRequest;
use App\Http\Requests\typeEntiteAdminCreateRequest;

class TypeEntiteAdminController extends Controller
{
    public function index(){
        $typeEntiteAdmins = TypeEntiteAdmin::orderBy("id")->paginate(5);
    
        return view('sanru.type_entite_admin.index', ['typeEntiteAdmins' => $typeEntiteAdmins]);
    }
    public function destroy(TypeEntiteAdmin $type_entite_admin){
    
        $name = $type_entite_admin->nom;

        if($type_entite_admin->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('type_entite_admin.index');

   }
   public function edit(TypeEntiteAdmin $type_entite_admin){

        return view('sanru.type_entite_admin.edit', compact('type_entite_admin'));
   }

   public function update(TypeEntiteAdmin $type_entite_admin, typeEntiteAdminRequest $request){

    $type_entite_admin->nom = $request->get('name');

    //dd($type_entite_admin);

    if($type_entite_admin->update())
    {
        Alert::success('Fait', "La mise à jour de $type_entite_admin->nom a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('type_entite_admin.index');

   }

   public function create(){

        return view('sanru.type_entite_admin.create');

   }

   public function store(TypeEntiteAdmin $typeEntiteAdmin, typeEntiteAdminCreateRequest $request){

    $typeEntiteAdmin->nom = $request->get('name');

    if($typeEntiteAdmin->save())
    {
        Alert::success('Fait', 'Ajout effectué');
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
    }
    
    return redirect()->route('type_entite_admin.index');

   }
}
