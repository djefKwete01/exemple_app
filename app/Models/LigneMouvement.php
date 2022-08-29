<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneMouvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'mouvement_id',
        'article_id',
        'quantite',
        'numero_serie'
    ];

    protected $attributes = [
    ];

    protected $table = 'ligne_mouvements';

    public $timestamps =  false;

    public function article(){

        return $this->belongsTo(Article::class);
    }

    public function mouvement(){

        return $this->belongsTo(Mouvement::class);
    }

}
