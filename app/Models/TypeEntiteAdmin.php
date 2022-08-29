<?php

namespace App\Models;

use App\Models\EntiteAdmin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeEntiteAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    protected $attributes = [
        'nom' => "",
    ];

    protected $table = 'type_entite_admins';

    public $timestamps =  false;

    public function entite_admins(){

        return $this->hasMany(EntiteAdmin::class, "type_entite_admin", "id");

    }
}
