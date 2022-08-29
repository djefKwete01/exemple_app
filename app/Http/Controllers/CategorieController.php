<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CategorieCreateRequest;
use App\Http\Requests\CategorieUpdateRequest;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::orderBy("nom")->paginate(5);
        return view("sanru.categorie.index", compact("categories"));
    }

    public function destroy(Categorie $categorie){
    
        $name = $categorie->nom;

        if($categorie->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('categorie.index');

   }
   public function edit(Categorie $categorie){

        return view('sanru.categorie.edit', compact('categorie'));
   }

   public function update(Categorie $categorie, CategorieUpdateRequest $request){

    $categorie->nom = $request->get('name');

    if($categorie->update())
    {
        Alert::success('Fait', "La mise à jour de $categorie->nom a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('categorie.index');

   }

   public function create(){

        return view('sanru.categorie.create');

   }

   public function store(Categorie $categorie, CategorieCreateRequest $request){

    $categorie->nom = $request->get('name');

    if($categorie->save())
    {
        Alert::success('Fait', 'Ajout effectué');
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
    }
    
    return redirect()->route('categorie.index');

   }
}
