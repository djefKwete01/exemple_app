<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{
    public function index(){

        $articles = Article::orderBy("nom")->paginate(5);
        
        return view('sanru.article.index', ['articles' => $articles]);
    }

    public function destroy(Article $article){
    
        $name = $article->nom;

        if($article->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('article.index');

   }
   public function edit(Article $article){
        
        $categories = Categorie::all();

        return view('sanru.article.edit', compact('article', 'categories'));
   }

   public function update(Article $article, ArticleUpdateRequest $request){
    
    $article->nom = $request->get('name');
    $article->categorie_id = $request->get('categorie');

    if($article->update())
    {
        Alert::success('Fait', "La mise à jour de $article->nom a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('article.index');

   }

   public function create(){

        $categories = Categorie::all();
        
        return view('sanru.article.create', ['categories' => $categories]);
    
    }
    public function store(Article $article, ArticleCreateRequest $request){
        
        $article->nom = $request->get('name');
        $article->categorie_id = $request->get('categorie');

        if($article->save())
        {
            Alert::success('Fait', 'Ajout effectué');
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
        }

        return redirect()->route('article.index');

       }
       public function show(Article $article){
            dd($article->entrepots()->get()[0]->nom);
       }
}
