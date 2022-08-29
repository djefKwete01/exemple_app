<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie_id',
    ];

    protected $attributes = [
        'nom' => "",
    ];

    protected $table = 'articles';

    public $timestamps =  false;

    public function categorie(){

        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function instances(){

        return $this->hasMany(Instance::class);

    }
    public function entrepots(){

        return $this->belongsToMany(Entrepot::class, 'instances','entrepot_id', 'article_id',  );
    }
    public function ligneMouvements(){

        return $this->hasMany(LigneMouvement::class);
    }
}
