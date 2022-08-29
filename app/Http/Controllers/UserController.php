<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\UserUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller{
   
    public function index(){
        $data['users'] = User::orderBy('id', 'desc')->paginate(2);
        //$categories = DB::table('categories')->get();
        //$premierLivre = DB::table('categories')->where('label', 'livre')->first();
        return view('users.index', $data);
   }

   
   public function create(){
    return view('users.create');
   }
   
   public function destroy(User $user){

        $name = $user->name;

        if($user->delete())
        {
            Alert::success('Fait', "$name a été supprimé avec succès !");
        }else{
            Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
        }
        
        return redirect()->route('users.index');

   }

   
   public function edit(User $user){
        return view('users.edition', compact('user'));
   }

   public function update(User $user, UserUpdateRequest $request){

    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->password = Hash::make($request->get('password'));

    if($user->save())
    {
        Alert::success('Fait', "La mise à jour de $user->name a été faite avec succès !");
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché, aucune donnée n\'a été affectée !');
    }
    
    return redirect()->route('users.index');

   }
  


   public function store(User $user, UserStoreRequest $request){

    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->password = Hash::make($request->get('password'));

    //User ::create($request->all())
    if($user->save())
    {
        Alert::success('Fait', 'Ajout effectué');
    }else{
        Alert::error('Dommage', 'Quelque chose n\'a pas bien marché !');
    }
    
    return redirect()->back();

   }
}