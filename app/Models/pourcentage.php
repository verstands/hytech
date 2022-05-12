<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pourcentage extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_pou ','titre', 'id_devise'];
}
