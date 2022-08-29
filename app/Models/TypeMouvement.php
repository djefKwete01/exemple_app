<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMouvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    protected $attributes = [
        'nom' => "",
    ];

    protected $table = 'type_mouvements';

    public $timestamps =  false;

    public function mouvements(){

        return $this->hasMany(Mouvement::class);

    }
}
