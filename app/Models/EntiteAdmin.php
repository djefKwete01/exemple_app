<?php

namespace App\Models;

use App\Models\TypeEntiteAdmin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntiteAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type_entite_admin'
    ];

    protected $attributes = [
        'nom' => "",
    ];

    protected $table = 'entite_admins';

    public $timestamps =  false;

    public function type_entite_admin(){

        return $this->belongsTo(TypeEntiteAdmin::class, "type_entite_admin", "id");
    }

    public function entrepots(){

        return $this->hasMany(Entrepot::class, "entite_admin", "id");

    }
}
