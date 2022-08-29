<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_serie',
        'utilisable' ,
        'status',
        'article_id',
        'entrepot_id',
    ];

    protected $attributes = [
        'numero_serie' => "",
    ];

    protected $table = 'instances';

    public $timestamps =  false;

    public function article(){

        return $this->belongsTo(Article::class);
    }
    public function entrepot(){

        return $this->belongsTo(Entrepot::class);
    }

}
