<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retrait extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $fillable=['	id_retrait ','user', 'montant', 'id_devise', 'date_retrait', 'id_eg', 'statut'];
}
