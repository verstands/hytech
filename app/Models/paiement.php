<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_paiement ','type_p', 'icon', 'lien_p', 'id_eg', 'type_lien'];
}
