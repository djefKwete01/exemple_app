<?php

namespace App\Models;

use App\Models\EntiteAdmin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrepot extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'entite_admin'
    ];

    protected $attributes = [
        'nom' => "",
    ];

    protected $table = 'entrepots';

    public $timestamps =  false;

    public function entite_admin(){

        return $this->belongsTo(EntiteAdmin::class, "entite_admin", "id");
    }
    public function instances(){

        return $this->hasMany(Instance::class);

    }
    public function articles(){

        return $this->belongsToMany(Article::class,'instances', 'article_id', 'entrepot_id' );
    }
    
}
