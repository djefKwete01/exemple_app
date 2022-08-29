<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mouvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type_mouvement_id',
        'expediteur',
        'beneficiaire',
        'status',
        'date'
    ];


    protected $attributes = [
    
    ];

    protected $table = 'mouvements';

    public $timestamps =  false;

    public function expediteur(){

        return $this->belongsTo(Entrepot::class, 'expediteur');
    }
    public function beneficiaire(){

        return $this->belongsTo(Entrepot::class, 'beneficiaire');
    }
    public function typeMouvement(){

        return $this->belongsTo(TypeMouvement::class, 'type_mouvement_id');

    }
    public function LigneMouvements(){

        return $this->hasMany(LigneMouvement::class);
        
    }
}
