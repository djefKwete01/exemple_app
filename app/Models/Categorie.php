<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    protected $attributes = [
        'nom' => "",
    ];

    protected $table = 'categories';

    public $timestamps =  false;

    public function articles(){

        return $this->hasMany(Article::class);

    }
}
