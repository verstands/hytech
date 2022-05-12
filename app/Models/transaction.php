<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_trans','user', 'montant', 'id_devise', 'id_eg', 'id_off', 'id_paiement', 'date_t'];
}
